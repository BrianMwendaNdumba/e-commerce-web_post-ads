<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingStoreRequest;
use App\Http\Requests\ListingUpdateRequest;
use App\Models\Listing;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Event;
use App\Events\FileUploaded;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use \Sightengine\SightengineClient;

class ListingController extends Controller
{
    public function store(ListingStoreRequest $request)
    {
        $data = $request->safe()->except(['images']);

        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($request->safe()->only('title')['title']);
        $listing = Listing::create($data);

        foreach ($request->images as $image) {
            // Add watermark to the image and get the temporary path
            $imageWithWatermark = $this->addWatermark($image);

            $listing->addMedia($imageWithWatermark)->toMediaCollection('listings');
            Storage::delete('storage/app/public/' . $image);

            event(new FileUploaded());
        }

        return redirect()->route('dashboard.index')
            ->with('success', 'your Ad Was Created');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $listing = Listing::where('slug', $slug)->with(['user', 'favourite', 'review'])
            ->firstOrFail();

        $all_listings = Listing::get();

        $reviews = Review::where('listing_id', $listing->id)->with(['user'])->get();

        $listings = $all_listings->except([$listing->id]);

        return view('ad')
            ->with('listing', $listing)
            ->with('listings', $listings)
            ->with('reviews', $reviews);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ListingUpdateRequest $request, $slug)
    {
        $listing = Listing::where('slug', $slug)
            ->firstOrFail();

        if ($this->verifyOwnership($listing)) {

            $data = $request->safe()->except(['images']);

            $data['user_id'] = auth()->user()->id;

            $data['slug'] = Str::slug($request->safe()->only('title')['title']);

            $media = $listing->getMedia('listings');

            foreach ($media as $image) {
                $ids[] = $image->id;
            }

            $preloaded = $request->safe()->only('preloaded')['preloaded'];

            $delete_images = array_diff($ids, $preloaded);

            if (!empty($delete_images)) {
                foreach ($delete_images as $id) {
                    $media->find($id)->delete();
                }
            }

            if ($request->has('images')) {
                foreach ($request->images as $image) {
                    $listing->addMedia($image)->toMediaCollection('listings');
                }
            }
            $listing->update($data);
            return redirect()->route('dashboard.index')
                ->with('success', 'your Ad Was updated');
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $listing = Listing::where('slug', $slug)
            ->firstOrFail();

        if ($this->verifyOwnership($listing)) {
            $listing->delete();
            $listing->clearMediaCollection('listings');
            return redirect()->route('dashboard.index')
                ->with('success', 'Your Ad Was Deleted');
        } else {
            abort(403);
        }
    }

    public function verifyOwnership($listing)
    {
        if ($listing->user_id == auth()->user()->id || auth()->user()->is_admin) {
            return true;
        } else {
            return false;
        }
    }

    private function addWatermark($image)
    {
        $watermarkPath = public_path('assets/img/watermark-light.png');
        $imageWithWatermark = Image::make($image)->insert($watermarkPath, 'center');

        // Save the watermarked image to a temporary file
        $tempPath = sys_get_temp_dir() . '/' . uniqid() . '.jpg';
        $imageWithWatermark->save($tempPath);

        // Extract the original filename from the uploaded image
        $originalFilename = $image->getClientOriginalName();

        // Move the watermarked image to the public disk with the original filename
        $destinationPath = '/' . $originalFilename;
        Storage::disk('public')->put($destinationPath, file_get_contents($tempPath));

        // Delete the temporary file
        unlink($tempPath);

        // Convert the temporary path to an UploadedFile object
        $file = new UploadedFile('storage/' . $originalFilename, $originalFilename, null, null, true);

        return $file;
    }

    private function checkImage($image)
    {
        $client = new SightengineClient(env('SIGHTENGINEUSER'), env('SIGHTENGINEKEY'));
        $output = $client->check(['nudity'])->set_file($image);

        if ($output['nudity']['raw'] > 0.5) {
            return false;
        } else {
            return true;
        }
    }
}
