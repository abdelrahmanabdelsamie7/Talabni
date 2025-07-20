<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code')->unique();
            $table->enum('type', ['percent', 'fixed']);
            $table->decimal('value', 8, 2);
            $table->integer('max_usage')->nullable();
            $table->integer('usage_count')->default(0);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
