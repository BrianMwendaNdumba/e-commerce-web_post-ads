<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingStoreRequest;
use App\Http\Requests\ListingUpdateRequest;
use App\Models\Listing;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    public function store(ListingStoreRequest $request)
    {

        $data = $request->safe()->except(['images']);
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($request->safe()->only('title')['title']);
        $listing = Listing::create($data);
        foreach ($request->images as $image) {
            $listing->addMedia($image)->toMediaCollection('listings');
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
}
