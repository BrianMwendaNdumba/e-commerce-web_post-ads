<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Listing;
use Illuminate\Http\Request;

class DashboardPageController extends Controller
{
    public function index()
    {
        // Get user and their listings
        $user = auth()->user();
        $listings = Listing::where('user_id', $user->id)->with(['user'])->get();
        return view('dashboard.index')->with('listings', $listings);
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function edit(string $slug)
    {
        $listing = Listing::where('slug', $slug)
            ->firstOrFail();
        foreach ($listing->getMedia('listings') as $image) {
            $imagePaths[] = [
                'id' => $image->id,
                'src' => $image->getFullUrl(),
            ];
        }
        return view('dashboard.edit')
            ->with('listing', $listing)
            ->with('imagePaths', $imagePaths);
    }

    public function featured()
    {
        return view('dashboard.featured');
    }

    public function favourites()
    {
        $user = auth()->user();
        $favourites = Favourite::where('user_id', $user->id)->with(['listing'])->get();
        return view('dashboard.favourites')->with('favourites', $favourites);
    }
}
