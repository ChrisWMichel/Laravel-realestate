<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        $listing->load('images');
        return inertia('Realtor/ListingImage/create', [
            'listing' => $listing
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Listing $listing, Request $request)
    {


        if ($request->hasFile('images')) {
            $request->validate([
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000'
            ],[
                'images.*.required' => 'Please select an image to upload.',
                'images.*.image' => 'The file must be an image.',
                'images.*.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg, webp.',
                'images.*.max' => 'The image must not be greater than 5MB.'
            ]);
            foreach ($request->file('images') as $image) {

                $path = $image->store('listing-images', 'public');

                // ListingImage::create([
                //     'listing_id' => $listing->id,
                //     'path' => $path
                // ]);
                $listing->images()->save(new ListingImage([
                    'path' => $path
                ]));
            }
        }

        return redirect()->back()->with('success', 'Image uploaded successfully.');
        //return redirect()->route('realtor.listing.index', $listing)->with('success', 'Images uploaded successfully.');
    }

    public function destroy($listing, ListingImage $image)
    {
        // TODO: Change the URL for the images when deploying to production
        //$relativePath = str_replace('http://127.0.0.1:8000/storage/', '', $image->path);
        //$relativePath = str_replace('https://michel-5.com/storage/', '', $image->path);
        $appUrl = config('app.url');
        $relativePath = str_replace($appUrl . '/storage/', '', $image->path);

        //Storage::disk('public')->delete($image->path);
        Storage::disk('public')->delete($relativePath);
        $image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }


}
