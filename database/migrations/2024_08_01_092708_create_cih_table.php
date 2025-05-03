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
        Schema::create('cih', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('type');
            $table->string('establishment');
            $table->string('payer_name');
            $table->string('lcn_number');
            $table->date('due_date');
            $table->decimal('amount', 15, 2);
            $table->string('account_number')->nullable();// Adapté pour les montants
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cih');
    }
};
