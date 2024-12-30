<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ListingController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except('index', 'show');
        //$this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {

        $filters = $request->only([
            'price_from', 'price_to', 'beds', 'baths', 'area_from', 'area_to'
        ]);

        $listings = Listing::query()->mostRecent()->filter($filters);

        return Inertia::render('Listing/index', [
            'listings' => $listings->paginate(10)->withQueryString(),
            'filters' => $filters,
            'user' => Auth::user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return inertia('Listing/create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(StoreListingRequest $request)
    // {
    //     Listing::create(array_merge(
    //         $request->all(),
    //         ['by_user_id' => Auth::id()]
    //     ));

    //     return redirect()->route('listing.index')->with('success', 'Listing created successfully.');
    // }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $listing = Listing::withTrashed()->findOrFail($id);

        return inertia('Listing/show', [
            'listing' => $listing,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit($id)
    // {
    //     //$this->authorize('update', $listing);
    //     $listing = Listing::findOrFail($id);
    //     return inertia('Listing/edit', [
    //         'listing' => $listing,
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateListingRequest $request, Listing $listing)
    // {
    //     $this->authorize('update', $listing);
    //     $listing->update($request->all());

    //     return redirect()->route('listing.index')->with('success', 'Listing updated successfully.');
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Listing $listing)
    // {
    //     $this->authorize('delete', $listing);

    //     $listing->delete();

    //     //return redirect()->route('listing.index')->with('success', 'Listing deleted successfully.');

    //     return redirect()->back()->with('success', 'Listing deleted successfully.');
    // }
}
