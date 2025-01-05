<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
         $phpVersion = phpversion();
        $laravelVersion = app()->version();

        return Inertia::render('Index/index', [
            'phpVersion' => $phpVersion,
            'laravelVersion' => $laravelVersion,
        ]);
    }

    public function show()
    {
        return Inertia::render('Index/show');
    }
}
