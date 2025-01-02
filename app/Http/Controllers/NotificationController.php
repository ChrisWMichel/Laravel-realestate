<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $notifications = $user->notifications()->paginate(10);

        return inertia('Notifications/index', [
            'notifications' => $notifications,
        ]);
    }
}
 