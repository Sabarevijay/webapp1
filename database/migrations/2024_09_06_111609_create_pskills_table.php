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
        Schema::create('pskills', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('register_number');
            $table->string('student_name');
            // $table->uuid('uu_id');
            $table->foreignId('uu_id')->constrained('piclabs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pskills');
    }
};
