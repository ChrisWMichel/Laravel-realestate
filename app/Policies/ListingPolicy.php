<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListingPolicy
{
    public function before(User $user): ?bool
    {
        if ($user?->is_admin) {
            return true;
        }
        return null;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Listing $listing): bool
    {
        //return true;
       // return $user?->id === $listing->by_user_id;
        if($listing->by_user_id === $user?->id){
            return true;
        }
        return $listing->sold_at === null;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Listing $listing)
    {
        return ($user->id === $listing->by_user_id && $listing->sold_at === null)
            ? Response::allow()
            : Response::deny('You do not own this listing.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Listing $listing)
    {
        return $user->id === $listing->by_user_id
         ? Response::allow()
         : Response::deny('You can not delete this listing.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Listing $listing): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Listing $listing): bool
    {
        return true;
    }
}
