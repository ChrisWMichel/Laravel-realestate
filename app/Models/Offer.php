<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = ['listing_id', 'user_id', 'amount', 'accepted_at', 'rejected_at'];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeMyOffer(Builder $query)
    {
        return $query->where('user_id', Auth::user()?->id);
    }

    public function scopeAccepted(Builder $query, Offer $offer): Builder
    {
        return $query->where('id', '!=', $offer->id);

    }


}
