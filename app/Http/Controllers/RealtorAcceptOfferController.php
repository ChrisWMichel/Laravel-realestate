<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer) {
        // authorize the action
        $listing = $offer->listing;
        $this->authorize('update', $listing);

        // accept selected offer
        $offer->update(['accepted_at' => now()]);
        $listing->sold_at = now();
        $listing->save();

          // reject all other offers
          $listing->offers()->accepted($offer)->update(['rejected_at' => now()]);

         return redirect()->back()->with('success', "Offer #{$offer->id} accepted successfully");
    }
}
