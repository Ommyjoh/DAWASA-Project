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
        Schema::table('connection_requests', function (Blueprint $table) {
            $table->timestamp('connApproveDate')->nullable();
            $table->string('meterNo')->nullable();
            $table->string('initialReading')->nullable();
            $table->string('remarks')->nullable();
            $table->string('connDays')->nullable();
            $table->string('plumber')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('connection_requests', function (Blueprint $table) {
            $table->dropColumn('connApproveDate');
            $table->dropColumn('meterNo');
            $table->dropColumn('initialReading');
            $table->dropColumn('remarks');
            $table->dropColumn('connDays');
            $table->dropColumn('plumber');
        });
    }
};
