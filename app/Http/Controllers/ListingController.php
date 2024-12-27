<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
//use Illuminate\Support\Facades\Log;

class ListingController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index', 'show');
    // }

    public function index()
    {
        $listings = Listing::all();


        return inertia('Listing/index', [
            'listings' => $listings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Listing/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
        //Log::info($request->all());
        Listing::create($request->all());

        return redirect()->route('listing.index')->with('success', 'Listing created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return inertia('Listing/show', [
            'listing' => $listing,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $listing = Listing::findOrFail($id);
        return inertia('Listing/edit', [
            'listing' => $listing,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, Listing $listing)
    {
        $listing->update($request->all());

        return redirect()->route('listing.index')->with('success', 'Listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        //return redirect()->route('listing.index')->with('success', 'Listing deleted successfully.');

        return redirect()->back()->with('success', 'Listing deleted successfully.');
    }
}
