<?php

namespace App\Http\Controllers;

use App\Models\County;
use App\Models\Favourite;
use App\Models\Listing;
use Illuminate\Http\Request;

class DashboardPageController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $listings = Listing::where('user_id', $user->id)->with(['user'])->latest()->get();

        $shareComponent = \Share::page(
            'https://www.google.com',
            'Share Example'
        )
            ->facebook()
            ->whatsapp();

        return view('dashboard.index', compact('listings', 'shareComponent'));
    }

    public function create()
    {
        $locations = County::all();

        return view('dashboard.create', compact('locations'));
    }

    public function edit(string $slug)
    {
        $listing = Listing::where('slug', $slug)
            ->firstOrFail();
        $locations = County::all();

        foreach ($listing->getMedia('listings') as $image) {
            $imagePaths[] = [
                'id' => $image->id,
                'src' => $image->getFullUrl(),
            ];
        }
        return view('dashboard.edit')
            ->with('listing', $listing)
            ->with('locations', $locations)
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
