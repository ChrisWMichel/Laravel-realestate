<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    public function store(Listing $listing, Request $request)
    {
        $this->authorize('view', $listing);
        $listing->offers()->create(
            $request->validate([
                'amount' => 'required|integer|min:1',
            ]) + [
                'user_id' => $request->user()->id,
                'listing_id' => $listing->id
            ]
        );

        return redirect()->back()->with('success', 'Offer submitted successfully.');
    }


}
