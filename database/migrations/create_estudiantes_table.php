<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id(); // clave primaria auto incremental
            $table->string('codigo', 21)->unique(); // único y no nullable
            $table->string('nombres', 120);
            $table->string('pri_ape', 120);
            $table->string('seg_ape', 100)->nullable();
            $table->string('dni', 8);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
