<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $listings = Listing::with(['user'])->get();
        
        return view('index')->with('listings', $listings);
    }

    public function ads()
    {
        $listings = Listing::with(['user'])->get();
        
        return view('ads')->with('listings', $listings);
    }

    public function report($slug)
    {
        $listing = Listing::where('slug', $slug)->with(['user'])
            ->firstOrFail();
        return view('report')
            ->with('listing', $listing);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->with(['listing'])
            ->firstOrfail();
            
        return view('category')->with('category', $category);
    }
}
