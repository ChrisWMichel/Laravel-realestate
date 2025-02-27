<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Notifications\OfferMade;

class OfferController extends Controller
{

    public function store(Listing $listing, Request $request)
    {
        if($listing->by_user_id === $request->user()->id){
            return redirect()->back()->with('error', 'You cannot make an offer on your own listing.');
        }
        $this->authorize('view', $listing);
       $offer = $listing->offers()->create(
            $request->validate([
                'amount' => 'required|integer|min:1',
            ]) + [
                'user_id' => $request->user()->id,
                'listing_id' => $listing->id
            ]
        );
        $listing->owner->notify(new OfferMade($offer));

        return redirect()->back()->with('success', 'Offer submitted successfully.');
    }


}
