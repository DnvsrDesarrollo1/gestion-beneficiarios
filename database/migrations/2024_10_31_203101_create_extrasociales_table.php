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
        Schema::create('extrasociales', function (Blueprint $table) {
            $table->id();
            $table->integer('orden');
            $table->string('unid_hab_id', 17);
            $table->integer('depto_id');
            $table->string('departamento', 15);
            $table->string('proy_id', 3);
            $table->string('nombre_proyecto', 150);
            $table->string('manzano', 15);
            $table->string('lote', 15);
            $table->string('nombre_titular', 100);
            $table->string('ci_titular', 50);
            $table->string('nombre_conyugue', 100);
            $table->string('ci_conyugue', 50);
            $table->string('aplic_ley850_estado_social_fuente', 255);
            $table->string('fuente_excepcionalidad', 255);
            $table->string('nombre_benef_excepcionalidad', 100);
            $table->string('ci_benf_exepcionalidad', 50);
            $table->string('estado_social_excepcionalidad', 50);
            $table->string('fuente_reasignacion', 255);
            $table->string('nombre_benef_reasignacion', 100);
            $table->string('ci_benef_reasignacion', 50);
            $table->string('estado_social_reasignacion', 50);
            $table->string('fuente_sustitucion', 255);
            $table->string('nombre_sustitucion', 100);
            $table->string('ci_benf_sustitucion', 50);
            $table->string('estado_social_sustitucion', 100);
            $table->string('observaciones_detalles', 255);
            $table->string('nombre_beneficiario_final', 100);
            $table->string('ci_beneficiario_final', 15);
            $table->string('nom_cony_benef_final', 100);
            $table->string('ci_conyu_benef_final', 15);
            $table->string('estado_social_benef_final', 50);
            $table->string('proceso_estado_benef_final', 255);
            $table->string('observacion_benef_final', 255);
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
        Schema::dropIfExists('extrasociales');
    }
};
