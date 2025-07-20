<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('customer_id')->nullable()->constrained('customers')->cascadeOnDelete();
            $table->foreignUuid('driver_id')->nullable()->constrained('drivers')->cascadeOnDelete();
            $table->foreignUuid('store_owner_id')->nullable()->constrained('store_owners')->cascadeOnDelete();
            $table->string('subject');
            $table->text('message');
            $table->enum('status', ['open', 'in_progress', 'closed'])->default('open');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
