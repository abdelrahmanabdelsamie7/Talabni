<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->foreignUuid('store_id')->constrained('stores')->cascadeOnDelete();
            $table->foreignUuid('driver_id')->nullable()->constrained('drivers')->onDelete('set null');
            $table->foreignUuid('address_id')->nullable()->constrained('addresses')->onDelete('set null');
            $table->decimal('total_price', 10, 2);
            $table->integer('total_items')->default(0);
            $table->string('status')->default('pending');
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
