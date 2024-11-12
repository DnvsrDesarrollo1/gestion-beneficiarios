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
        Schema::create('extracreditos', function (Blueprint $table) {
            $table->string('unid_hab_id', 17);
            $table->string('codigo_credito', 15);
            $table->string('ci', 15);
            $table->string('entidad_financiera', 30);
            $table->string('nombre_beneficiario', 30);
            $table->string('proyecto', 30);
            $table->integer('subprograma');
            $table->decimal('tasa_interes', 10, 5);
            $table->decimal('tasa_seguro_desgravamen', 10, 5);
            $table->string('sexo', 30);
            $table->string('fono', 30);
            $table->date('fecha_nacimiento');
            $table->decimal('monto_total_credito', 10, 2);
            $table->decimal('monto_migrado_idepro', 10, 2);
            $table->float('factor_ajuste', 10, 2);
            $table->decimal('capital_migrado', 10, 2);
            $table->decimal('interes_migrado', 10, 2);
            $table->decimal('detalle_ajuste', 10, 2);
            $table->decimal('monto_activado', 10, 2);
            $table->decimal('total_activado', 10, 2);
            $table->date('fecha_activacion');
            $table->date('fecha_reajuste');
            $table->decimal('saldo_fondesif', 10, 2);
            $table->date('fecha_ultimo_pago');
            $table->decimal('cuentas_fondesif', 10, 2);
            $table->decimal('depositos_cuenta_matriz', 10, 2);
            $table->decimal('capital_unicobro', 10, 2);
            $table->decimal('cuotas_canceladas', 10, 2);
            $table->date('fecha_ult_pago_unicobro');
            $table->date('venci_ult_cuota_pagada');
            $table->decimal('saldo_a_fecha', 10, 2);
            $table->decimal('monto_canceladoafecha', 10, 2);
            $table->string('departamento', 30);
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
        Schema::dropIfExists('extracreditos');
    }
};
