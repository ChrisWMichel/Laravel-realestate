<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ListingController extends Controller
{

    public function index(Request $request)
    {

        $filters = $request->only([
            'price_from', 'price_to', 'beds', 'baths', 'area_from', 'area_to'
        ]);

        $listings = Listing::query()
        ->mostRecent()
        ->filter($filters)
        ->withoutSold()
        ->paginate(10)
        ->withQueryString();

        return Inertia::render('Listing/index', [
            'listings' => $listings,
            'filters' => $filters,
            //'user' => Auth::user(),
        ]);
    }


    public function show($id)
    {
        $listing = Listing::withTrashed()->findOrFail($id);
        $listing->load('images');
        $offer = !Auth::user() ? null : $listing->offers()->myOffer()->first();

        return inertia('Listing/show', [
            'listing' => $listing,
            'offerMade' => $offer,
        ]);
    }


}
