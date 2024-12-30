<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;

class RealtorController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(Listing::class, 'listing');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];
        $listings = Listing::query()
            ->where('by_user_id', Auth::id())
            ->filter($filters)
            ->paginate(10)
            ->withQueryString();

        return inertia('Realtor/index', [
            'listings' => $listings,
            'user' => Auth::user(),
            'filters' => $filters
        ]);
    }

    public function create()
    {
        return inertia('Realtor/create');
    }

    public function store(StoreListingRequest $request)
    {
        Listing::create(array_merge(
            $request->all(),
            ['by_user_id' => Auth::id()]
        ));

        return redirect()->route('realtor.listing.index')->with('success', 'Listing created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        //$this->authorize('update', $listing);
        $listing = Listing::withTrashed()->findOrFail($id);
        return inertia('Realtor/edit', [
            'listing' => $listing,
        ]);
    }

    public function update(UpdateListingRequest $request, Listing $listing)
    {
        $this->authorize('update', $listing);
        $listing->update($request->all());

        return redirect()->route('realtor.listing.index')->with('success', 'Listing updated successfully.');
    }

    public function destroy(Listing $listing)
    {
        $this->authorize('delete', $listing);

        $listing->deleteOrFail();

        //return redirect()->route('listing.index')->with('success', 'Listing deleted successfully.');

        return redirect()->back()->with('success', 'Listing deleted successfully.');
    }

    public function restore($id)
    {
        $listing = Listing::withTrashed()->findOrFail($id);
        $this->authorize('restore', $listing);

        $listing->restore();

        return redirect()->back()->with('success', 'Listing restored successfully.');
    }
}
