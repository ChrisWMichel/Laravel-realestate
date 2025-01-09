<?php

use Illuminate\Support\Facades\Artisan;

require __DIR__ . '/../laravel-realestate/vendor/autoload.php';

$app = require_once __DIR__ . '/../laravel-realestate/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Clear cache
Artisan::call('cache:clear');
Artisan::call('config:clear');
Artisan::call('route:clear');
Artisan::call('view:clear');

echo "Cache is cleared!";

