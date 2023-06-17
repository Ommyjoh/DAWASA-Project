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
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('invoiceNo')->nullable();
            $table->enum('engineerStatus', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->enum('paymentStatus', ['Not Paid','Paid'])->default('Not paid');
            $table->string('engineerNote')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('invoiceNo');
            $table->dropColumn('engineerStatus');
            $table->dropColumn('paymentStatus');
            $table->dropColumn('engineerNote');
        });
    }
};
