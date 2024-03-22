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
        Schema::create('monthly_reports', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(DB::raw('CURRENT_DATE'));
            $table->double('gawa')->default(0);
            $table->double('form')->default(0);
            $table->double('mauzo_cash')->default(0);
            $table->double('mauzo_mpesa')->default(0);
            $table->double('allowance')->default(0);
            $table->double('mtaji_mpesa')->default(0);
            $table->double('expenditure_cash')->default(0);
            $table->double('expenditure_mpesa')->default(0);
            $table->double('support_in')->default(0);
            $table->double('support_out')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_reports');
    }
};
