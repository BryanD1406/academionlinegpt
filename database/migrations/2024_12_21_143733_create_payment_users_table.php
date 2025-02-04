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
        Schema::create('payment_users', function (Blueprint $table) {
            $table->id();

            // Datos de la boleta
            $table->string('serie', 4)->default('B001'); // Serie fija (B001)
            $table->integer('numero'); // Número correlativo (ej. 610)
            $table->string('codigo_boleta')->unique(); // Código único (ej. B001-610)

            // Información del cliente
            $table->string('user_social'); // Nombre o razón social del cliente
            $table->string('user_address')->nullable(); // Dirección del cliente
            $table->unsignedBigInteger('user_id'); // Relación con la tabla de usuarios

            // Información del curso
            $table->unsignedBigInteger('course_id'); // Relación con la tabla de cursos
            $table->string('course_description'); // Descripción del curso
            $table->integer('amount')->default(1); // Cantidad (normalmente será 1 curso)

            // Información de la boleta
            $table->date('date'); // Fecha de emisión
            $table->double('venta_total', 10, 2); // Precio final con IGV
            $table->string('payment_condition')->default('Efectivo'); // Condición de pago
            $table->string('pdf_url')->nullable();

            // Relaciones
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_users');
    }
};
