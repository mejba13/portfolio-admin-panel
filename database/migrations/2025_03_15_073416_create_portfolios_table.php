<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // Add this
            $table->string('description', 1024)->nullable();
            $table->string('color')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->date('published_at')->nullable(); // Add this
            $table->timestamps();
        });

    }

    public function down(): void {
        Schema::dropIfExists('portfolios');
    }
};
