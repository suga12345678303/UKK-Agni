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
        Schema::create('digital_receipts', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_number')->nullable();
            $table->date('receipt_date');
            $table->text('description');
            $table->decimal('amount', 15, 2);
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_receipts');
    }
};
