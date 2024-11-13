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
        Schema::create('driver_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_user_id')->constrained('driver_user')->onDelete('cascade');
            $table->string('lingua');
            $table->enum('fluencia', ['Fluente', 'Intermediário', 'Básico', 'Nenhuma']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_education');
    }
};
