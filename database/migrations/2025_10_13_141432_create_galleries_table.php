<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('image_url');
            $table->string('caption')->nullable();
            $table->enum('category', ['performance', 'behind_the_scenes', 'instruments', 'travel']);
            $table->foreignId('event_id')->nullable()->constrained('events')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
