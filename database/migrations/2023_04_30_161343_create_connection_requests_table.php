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
        Schema::create('connection_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('lgo_id')->constrained();
            $table->string('fullName');
            $table->string('occupation');
            $table->string('nationality');
            $table->string('phone')->unique();
            $table->string('connReason');
            $table->string('servRequired');
            $table->string('district');
            $table->string('ward');
            $table->string('street');
            $table->string('house');
            $table->string('plot');
            $table->string('passport');
            $table->string('idCard');
            $table->enum('lgoStatus', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->enum('dawasaStatus', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->string('lgoNote')->nullable();
            $table->string('dawasaNote')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connection_requests');
    }
};
