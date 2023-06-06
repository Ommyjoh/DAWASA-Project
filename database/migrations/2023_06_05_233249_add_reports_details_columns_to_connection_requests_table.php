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
            $table->enum('surveyorStatus', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->string('jobTitle')->nullable();
            $table->string('distance')->nullable();
            $table->string('cordX')->nullable();
            $table->string('cordY')->nullable();
            $table->timestamp('surveyorApprovedDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('connection_requests', function (Blueprint $table) {
            $table->dropColumn('surveyorStatus');
            $table->dropColumn('jobTitle');
            $table->dropColumn('distance');
            $table->dropColumn('cordX');
            $table->dropColumn('cordY');
            $table->dropColumn('surveyorApprovedDate');
        });
    }
};
