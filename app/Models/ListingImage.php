<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListingImage extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['path'];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function getPathAttribute()
    {
        //return asset("storage/{$this->attributes['path']}");
        return asset($this->attributes['path']);
    }
}
