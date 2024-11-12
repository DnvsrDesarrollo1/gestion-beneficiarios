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
        Schema::create('extralegales', function (Blueprint $table) {
            $table->id();
            $table->string('unid_hab_id', 17);
            $table->string('departamento', 30);
            $table->string('proyecto', 150);
            $table->integer('nro');
            $table->string('nombre_apellidos', 150);
            $table->string('cedula_identidad', 50);
            $table->string('manzano', 15);
            $table->string('lote', 15);
            $table->string('nro_folio_real', 30);
            $table->string('titulacion', 255);
            $table->string('observaciones1', 255);
            $table->string('levantam_grav_dev_documentos', 255);
            $table->string('observado_ley850', 255);
            $table->string('notificación_intención', 255);
            $table->string('notificación_res_contractual', 255);
            $table->string('elab_minut_res_contrc_testim', 255);
            $table->string('folio_nombre_aevivienda', 255);
            $table->string('observaciones2', 255);
            $table->string('inicio_reasignación_sustitución', 255);
            $table->string('nuevo_beneficiario', 150);
            $table->string('ci_nuevo_benef', 50);
            $table->string('minuta_testimonio_folio', 255);
            $table->string('observaciones3', 255);
            $table->decimal('capital_unicobro', 10, 2);
            $table->decimal('cuotas_canceladas', 10, 2);
            $table->date('fecha_ult_pago_unicobro');
            $table->date('venci_ult_cuota_pagada');
            $table->decimal('saldo_a_fecha', 10, 2);
            $table->decimal('monto_canceladoafecha', 10, 2);
            $table->decimal('cuotas_adeudas', 10, 2);
            $table->integer('dias');
            $table->string('estado_cartera', 30);
            $table->string('observacion', 255);
            $table->string('apuntes', 255);
            $table->string('estado_social', 100);
            $table->timestamps();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extralegales');
    }
};
