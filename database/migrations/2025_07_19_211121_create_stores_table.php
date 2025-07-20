<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('store_owner_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('logo');
            $table->string('type');
            $table->text('address');
            $table->string('location_lat')->nullable();
            $table->string('location_lng')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
