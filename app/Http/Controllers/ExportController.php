<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Str;

class ExportController extends Controller
{

    function limpiarCampo($valor)
    {
        // Elimina saltos de línea
        $valor = str_replace(["\r", "\n", "\r\n"], ' ', $valor);

        // Escapa comillas dobles (")
        $valor = str_replace('"', '""', $valor);

        return trim($valor);
    }

    public function exportCsvDirecto(Request $request)
    {
        $fileName = 'info_proyecto.csv';

        $response = new StreamedResponse(function () use ($request) {
            $handle = fopen('php://output', 'w');
            //fputs($handle, chr(0xEF) . chr(0xBB) . chr(0xBF)); // <- BOM para Excel

            // Encabezados del CSV
            fputcsv($handle, [
                'UNIDAD HABITACIONAL',
                'DEPARTAMENTO',
                'PROY_ID',
                'PROYECTO',
                'MANZANO',
                'LOTE',
                'PORCENTAJE AVANCE FIS.',
                'TITULAR',
                'CI TITULAR',
                'EXT. CI. TI',
                'CONYUGUE',
                'CI CONYUGUE',
                'EXT. CI. CY',
                'ESTADO SOCIAL TITULAR',
                'FUENTE EXCEPCIONALIDAD',
                'BENEFICIARIO EXCEPCIONALIDAD',
                'CI BENEF. EXCEP.',
                'EXT. CI. EX',
                'ESTADO SOCIAL EXCEPCIONALIDAD',
                'FUENTE REASIGNACION',
                'BENEFICIARIO REASIGNACION',
                'CI BENEF. REASIGN.',
                'EXT. CI. RE',
                'ESTADO SOCIAL REASIGNACION',
                'FUENTE SUSTITUCION',
                'BENEFICIARIO SUSTITUCION',
                'CI BENEF. SUSTIT.',
                'EXT. CI. ST',
                'ESTADO SOCIAL SUSTITUCION',
                'FUENTE CAMBIO TITULAR',
                'NOMBRE CAMBIO TITULAR',
                'CI CAMBIO TIT.',
                'EXT. CI. CT',
                'ESTADO SOCIAL CAMBIOTITULAR',
                'OBSERVACIONES DETALLES',
                'NOMBRE BENEFICIARIO FINAL',

                'CI BENEF. FINAL',
                'EXT. CI. BF',

                'CONYUGUE BENEF. FINAL',
                'CI CONY. BENEF. FINAL',
                'EXT. CI. CYBF',

                'ESTADO SOCIAL BENEF FINAL',
                'PROCESO ESTADO BENEF FINAL',
                'OBSERVACION BENEF FINAL',
                'TELEFONO/CELULAR S.',
                'BENEFICIARIO (EN CREDITO)',
                'CI BENEF- CREDITO',
                'FECHA NACIMIENTO',
                'TELEFONO/CELULAR C.',
                'ENTIDAD FINANCIERA',
                'MONTO TOTAL CREDITO',
                'MONTO ACTIVADO',
                'TOTAL ACTIVADO',
                'FECHA ACTIVACION',

                'SALDO A FECHA',
                'ESTADO CARTERA',
                'OBSERVACION',
                'REESTRUCTURADO',
                'NRO (EN LEGAL)',
                'BENEFICIARIO (EN LEGAL)',
                'CI BENEFICIARIO',
                'MANZANO L',
                'LOTE L',
                'NRO FOLIO REAL',
                'ESTADO FOLIO',
                'TITULACION',
                'OBSERVACIONES1',
                'LEVANTAM GRAV DEV DOCUMENTOS',
                'OBSERVADO LEY850',
                'NOTIFICACION INTENCIÓN',
                'NOTIFICACIÓN RES CONTRACTUAL',
                'ELAB MINUT RES CONTRC TESTIM',
                'FOLIO NOMBRE AEVIVIENDA',
                'OBSERVACIONES2',
                'INICIO REASIGNACIÓN SUSTITUCIÓN',
                'NUEVO BENEFICIARIO',
                'CI NUEVO BENEF',
                'MINUTA TESTIMONIO FOLIO',
                'OBSERVACIONES3'
            ]);

            // Consulta base
            $query = DB::table('extrasocial as s')
                ->join('extracreditos as c', 's.unid_hab_id', '=', 'c.unid_hab_id')
                ->join('extralegal as le', 's.unid_hab_id', '=', 'le.unid_hab_id')
                ->select([
                    's.unid_hab_id',
                    's.departamento',
                    's.proy_id',
                    's.nombre_proyecto',
                    's.manzano as manzano_s',
                    's.lote as lote_s',
                    's.porcentaje_avan_fis',
                    's.nombre_titular',
                    's.ci_titular',
                    's.ext_ci_titular',
                    's.nombre_conyugue',
                    's.ci_conyugue',
                    's.ext_ci_cony',
                    's.aplic_ley850_estado_social_fuente',
                    's.fuente_excepcionalidad',
                    's.nombre_benef_excepcionalidad',
                    's.ci_benef_excepcionalidad',
                    's.ext_ci_excep',
                    's.estado_social_excepcionalidad',
                    's.fuente_reasignacion',
                    's.nombre_benef_reasignacion',
                    's.ci_benef_reasignacion',
                    's.ext_ci_reasig',
                    's.estado_social_reasignacion',
                    's.fuente_sustitucion',
                    's.nombre_sustitucion',
                    's.ci_benf_sustitucion',
                    's.ext_ci_sust',
                    's.estado_social_sustitucion',
                    's.fuente_cambio_titular',
                    's.nombre_cambio_titular',
                    's.ci_cambio_titular',
                    's.ext_cambio_titular',
                    's.estado_social_cambiotitular',
                    's.observaciones_detalles',
                    's.nombre_beneficiario_final',

                    's.ci_beneficiario_final',
                    's.ext_ci_final',
                    's.nom_cony_benef_final',
                    's.ci_conyu_benef_final',
                    's.ext_ci_final_cony',

                    's.estado_social_benef_final',
                    's.proceso_estado_benef_final',
                    's.observacion_benef_final',
                    's.telefono_final',
                    'c.nombre_beneficiario',
                    'c.ci',
                    'c.fecha_nacimiento',
                    'c.fono',
                    'c.entidad_financiera',
                    'c.monto_total_credito',
                    'c.monto_activado',
                    'c.total_activado',
                    'c.fecha_activacion',

                    'c.saldo_a_fecha',
                    'c.estado_cartera',
                    'c.observacion',
                    'c.reestructurados',
                    'le.nro',
                    'le.nombre_apellidos',
                    'le.cedula_identidad',
                    'le.manzano as manzano_le',
                    'le.lote as lote_le',
                    'le.nro_folio_real',
                    'le.estado_folio',
                    'le.titulacion',
                    'le.observaciones1',
                    'le.levantam_grav_dev_documentos',
                    'le.observado_ley850',
                    'le.notificación_intención',
                    'le.notificación_res_contractual',
                    'le.elab_minut_res_contrc_testim',
                    'le.folio_nombre_aevivienda',
                    'le.observaciones2',
                    'le.inicio_reasignación_sustitución',
                    'le.nuevo_beneficiario',
                    'le.ci_nuevo_benef',
                    'le.minuta_testimonio_folio',
                    'le.observaciones3',
                ]);

            // Filtros
            if ($request->filled('departamento')) {
                $query->where('s.depto_id', $request->departamento);
            }
            if ($request->filled('proyecto')) {
                $query->where('s.proy_id', $request->proyecto);
            }

            $registros = $query->get();
            if ($registros->isEmpty()) {
                fputcsv($handle, ['No se encontraron datos con los filtros seleccionados.']);
                fclose($handle);
                return;
            }
            foreach ($registros as $fila) {
                fputcsv($handle, [
                    $fila->unid_hab_id,
                    $fila->departamento,
                    $fila->proy_id,
                    $fila->nombre_proyecto,
                    $fila->manzano_s,
                    $fila->lote_s,
                    $fila->porcentaje_avan_fis,
                    $fila->nombre_titular,
                    $fila->ci_titular,
                    $fila->ext_ci_titular,
                    $fila->nombre_conyugue,
                    $fila->ci_conyugue,
                    $fila->ext_ci_cony,
                    $fila->aplic_ley850_estado_social_fuente,
                    Str::limit($this->limpiarCampo($fila->fuente_excepcionalidad), 500),
                    $fila->nombre_benef_excepcionalidad,
                    $fila->ci_benef_excepcionalidad,
                    $fila->ext_ci_excep,
                    $fila->estado_social_excepcionalidad,
                    Str::limit($this->limpiarCampo($fila->fuente_reasignacion), 500),
                    $fila->nombre_benef_reasignacion,
                    $fila->ci_benef_reasignacion,
                    $fila->ext_ci_reasig,
                    $fila->estado_social_reasignacion,
                    Str::limit($this->limpiarCampo($fila->fuente_sustitucion), 500),
                    $fila->nombre_sustitucion,
                    $fila->ci_benf_sustitucion,
                    $fila->ext_ci_sust,
                    $fila->estado_social_sustitucion,
                    $fila->fuente_cambio_titular,
                    $fila->nombre_cambio_titular,
                    $fila->ci_cambio_titular,
                    $fila->ext_cambio_titular,
                    $fila->estado_social_cambiotitular,
                    Str::limit($this->limpiarCampo($fila->observaciones_detalles), 500),
                    $fila->nombre_beneficiario_final,

                    $fila->ci_beneficiario_final,
                    $fila->ext_ci_final,

                    $fila->nom_cony_benef_final,
                    $fila->ci_conyu_benef_final,
                    $fila->ext_ci_final_cony,


                    $fila->estado_social_benef_final,
                    $fila->proceso_estado_benef_final,
                    Str::limit($this->limpiarCampo($fila->observacion_benef_final), 500),
                    $fila->telefono_final,
                    $fila->nombre_beneficiario,
                    $fila->ci,
                    $fila->fecha_nacimiento,
                    $fila->fono,
                    $fila->entidad_financiera,
                    $fila->monto_total_credito,
                    $fila->monto_activado,
                    $fila->total_activado,
                    $fila->fecha_activacion,
                    $fila->saldo_a_fecha,

                    $fila->estado_cartera,
                    Str::limit($this->limpiarCampo($fila->observacion), 500),
                    $fila->reestructurados,
                    $fila->nro,
                    $fila->nombre_apellidos,
                    $fila->cedula_identidad,
                    $fila->manzano_le,
                    $fila->lote_le,
                    $fila->nro_folio_real,
                    $fila->estado_folio,
                    $fila->titulacion,
                    $fila->observaciones1,
                    $fila->levantam_grav_dev_documentos,
                    $fila->observado_ley850,
                    $fila->notificación_intención,
                    $fila->notificación_res_contractual,
                    $fila->elab_minut_res_contrc_testim,
                    $fila->folio_nombre_aevivienda,
                    Str::limit($this->limpiarCampo($fila->observaciones2), 500),
                    $fila->inicio_reasignación_sustitución,
                    $fila->nuevo_beneficiario,
                    $fila->ci_nuevo_benef,
                    $fila->minuta_testimonio_folio,
                    Str::limit($this->limpiarCampo($fila->observaciones3), 500),

                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $fileName . '"');

        return $response;
    }
}
