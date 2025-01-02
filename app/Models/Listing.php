<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $sortable = ['price', 'created_at'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'by_user_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ListingImage::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function scopeMostRecent(Builder $query)
    {
        $query->orderBy('created_at', 'desc');
    }

    public function scopeWithoutSold(Builder $query)
    {
        $query->whereNull('sold_at');
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['price_from'] ?? false, function ($query, $price_from) {
            $query->where('price', '>=', $price_from);
        });

        $query->when($filters['price_to'] ?? false, function ($query, $price_to) {
            $query->where('price', '<=', $price_to);
        });

        $query->when($filters['beds'] ?? false, function ($query, $beds) {
            if ($beds == 6) {
                $query->where('beds', '>=', 6);
            } else {
                $query->where('beds', $beds);
            }
        });

        $query->when($filters['baths'] ?? false, function ($query, $baths) {

            if ($baths == 6) {
                $query->where('baths', '>=', 6);
            } else {
                $query->where('baths', $baths);
            }
        });

        $query->when($filters['area_from'] ?? false, function ($query, $area_from) {
            $query->where('area', '>=', $area_from);
        });

        $query->when($filters['area_to'] ?? false, function ($query, $area_to) {
            $query->where('area', '<=', $area_to);
        });
        $query->when($filters['deleted'] ?? false, function ($query, $deleted) {
            $query->onlyTrashed();
        });
        $query->when($filters['by'] ?? false, function ($query, $by)  use ($filters) {
            if (in_array($by, $this->sortable)) {
                $query->orderBy($by, $filters['order'] ?? 'desc');
            }

        });
    }


}
