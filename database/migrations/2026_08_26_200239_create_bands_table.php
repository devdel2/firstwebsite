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
        Schema::create('bands', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('band_name');
            $table->integer('year_founded');
            $table->boolean('is_active');
            $table->text('description');
            $table->integer('number_members');
            $table->string('spotify_url');
            $table->string('apple_music_url');
            $table->string('youtube_url');
            $table->string('instagram_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bands');
    }
};
