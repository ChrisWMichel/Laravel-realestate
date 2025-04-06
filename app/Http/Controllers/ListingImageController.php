<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
                $path = $this->saveImage($image);
                $listing->images()->create([
                    'path' => $path
                ]);
            }
        }

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    public function destroy($listing, ListingImage $image)
    {
        // Extract the relative path from the full URL
        $relativePath = str_replace('https://images-cwm-portfolio.s3.us-east-2.amazonaws.com/', '', $image->path);
    
        Storage::disk('s3')->delete($relativePath);
    
        $image->delete();
    
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

    private function saveImage($image)
    {
        $file = $image;
        $filename = time() . '-' . $file->getClientOriginalName();

        $path = Storage::disk('s3')->putFileAs('images/realtor', $file, $filename);

        $url = Storage::disk('s3')->url($path);
        
        return $url;
    }


}
