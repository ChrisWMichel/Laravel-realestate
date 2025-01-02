<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('beds');
            $table->unsignedTinyInteger('baths');
            $table->integer('area');
            $table->tinyText('city');
            $table->tinyText('area_code');
            $table->tinyText('street');
            $table->tinyText('street_nr');
            $table->unsignedInteger('price');
            $table->timestamp('sold_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('listings', [
            'beds', 'baths', 'area', 'city', 'code', 'street', 'street_nr', 'price', 'sold_at'
        ]);
    }
};
