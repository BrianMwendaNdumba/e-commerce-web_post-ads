<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Listing;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\Report;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{

    public function search(Request $request)
    {
        $request->validate([
            'q' => ['required', 'string', 'max:255'],
        ]);

        $q = $request->q;

        $listings = Listing::where('title', 'like', "%{$q}%")->get();
        return view('search')->with('listings', $listings);
    }

    public function contact(Request $request)
    {

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ]);

        Message::create([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'message' => $request->message,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('contact')
            ->with('success', 'Your Message was sent');
    }

    public function report(Request $request)
    {
        $request->validate([
            'listing' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ]);

        $listing = Listing::where('slug', $request->listing)
            ->firstOrFail();

        Report::create([
            'user_id' => auth()->user()->id,
            'listing_id' => $listing->id,
            'message' => $request->message,
        ]);

        return redirect()->back()
            ->with('success', 'Your Report was sent. We will review it shortly');
    }

    public function review(Request $request)
    {
        $request->validate([
            'listing' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ]);

        $listing = Listing::where('slug', $request->listing)
            ->firstOrFail();

        Review::create([
            'user_id' => auth()->user()->id,
            'listing_id' => $listing->id,
            'message' => $request->message,
        ]);

        return redirect()->back()
            ->with('success', 'Your Review was sent.');
    }

    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'max:255'],
        ]);

        Newsletter::create([
            'email' => $request->email,
        ]);

        return redirect()->back()
            ->with('success', 'Sent Successfully.');
    }

    public function favourite(Request $request)
    {
        $request->validate([
            'favourite' => ['required', 'string', 'max:255'],
        ]);

        $listing = Listing::where('slug', $request->favourite)
            ->firstOrFail();

        if ($this->checkIfFavouriteExist($listing)) {
            Favourite::where('user_id', auth()->user()->id)->where('listing_id', $listing->id)->delete();
        } else {
            $data = [
                'user_id' => auth()->user()->id,
                'listing_id' => $listing->id
            ];
            Favourite::create($data);
        }

        return response()->json(['success' => 'Success']);
    }

    public function checkIfFavouriteExist($listing)
    {
        $favouties = Favourite::where('user_id', auth()->user()->id)->get();
        if ($favouties->contains('listing_id', $listing->id)) {
            return true;
        } else {
            return null;
        }
    }
}
