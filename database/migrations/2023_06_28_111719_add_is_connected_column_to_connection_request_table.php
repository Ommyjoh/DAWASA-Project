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
            $table->enum('isConnected', ['Yes', 'No'])->default('No');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('connection_requests', function (Blueprint $table) {
            $table->dropColumn('iscConnected');
        });
    }
};
