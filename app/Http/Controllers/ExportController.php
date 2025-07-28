<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function exportCsvDirecto(Request $request)
    {
        $fileName = 'info_proyecto.csv';

        $response = new StreamedResponse(function () use ($request) {
            $handle = fopen('php://output', 'w');

            // Encabezados del CSV
            fputcsv($handle, [
                'DEPARTAMENTO',
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
                'ESTADO CARTERA',
                'OBSERVACION',
                'REESTRUCTURADO',
                'BENEFICIARIO (EN LEGAL)',
                'CI BENEFICIARIO',
                'MANZANO L',
                'LOTE L',
                'NRO FOLIO REAL',
                'ESTADO FOLIO',
                'TITULACION',
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
                    's.departamento',
                    's.nombre_proyecto',
                    's.manzano',
                    's.lote',
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
                    'c.estado_cartera',
                    'c.observacion',
                    'c.reestructurados',
                    'le.nombre_apellidos',
                    'le.cedula_identidad',
                    'le.manzano',
                    'le.lote',
                    'le.nro_folio_real',
                    'le.estado_folio',
                    'le.titulacion',
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

            // 🔽🔽 Aquí van los filtros — esta es la parte importante 🔽🔽

            if ($request->filled('departamento')) {
                // Si el <select> envía el departamento_id
                $query->where('s.depto_id', $request->departamento);
            }

            if ($request->filled('proyecto')) {
                // Si el <select> envía el proy_id
                $query->where('s.proy_id', $request->proyecto);
            }

            // Ejecutar consulta

            $registros = $query->get();
            //dd($registros);
            if ($registros->isEmpty()) {
                fputcsv($handle, ['No se encontraron datos con los filtros seleccionados.']);
                fclose($handle);
                return;
            }
            // Escribir CSV
            foreach ($registros as $fila) {
                fputcsv($handle, [
                    $fila->departamento,
                    $fila->nombre_proyecto,
                    $fila->manzano,
                    $fila->lote,
                    $fila->porcentaje_avan_fis,
                    $fila->nombre_titular,
                    $fila->ci_titular,
                    $fila->ext_ci_titular,
                    $fila->nombre_conyugue,
                    $fila->ci_conyugue,
                    $fila->ext_ci_cony,
                    $fila->aplic_ley850_estado_social_fuente,
                    $fila->fuente_excepcionalidad,
                    $fila->nombre_benef_excepcionalidad,
                    $fila->ci_benef_excepcionalidad,
                    $fila->ext_ci_excep,
                    $fila->estado_social_excepcionalidad,
                    $fila->fuente_reasignacion,
                    $fila->nombre_benef_reasignacion,
                    $fila->ci_benef_reasignacion,
                    $fila->ext_ci_reasig,
                    $fila->estado_social_reasignacion,
                    $fila->fuente_sustitucion,
                    $fila->nombre_sustitucion,
                    $fila->ci_benf_sustitucion,
                    $fila->ext_ci_sust,
                    $fila->estado_social_sustitucion,
                    $fila->fuente_cambio_titular,
                    $fila->nombre_cambio_titular,
                    $fila->ci_cambio_titular,
                    $fila->ext_cambio_titular,
                    $fila->estado_social_cambiotitular,
                    $fila->observaciones_detalles,
                    $fila->nombre_beneficiario_final,
                    $fila->estado_social_benef_final,
                    $fila->proceso_estado_benef_final,
                    $fila->observacion_benef_final,
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
                    $fila->estado_cartera,
                    $fila->observacion,
                    $fila->reestructurados,
                    $fila->nombre_apellidos,
                    $fila->cedula_identidad,
                    $fila->manzano,
                    $fila->lote,
                    $fila->nro_folio_real,
                    $fila->estado_folio,
                    $fila->titulacion,
                    $fila->levantam_grav_dev_documentos,
                    $fila->observado_ley850,
                    $fila->notificación_intención,
                    $fila->notificación_res_contractual,
                    $fila->elab_minut_res_contrc_testim,
                    $fila->folio_nombre_aevivienda,
                    $fila->observaciones2,
                    $fila->inicio_reasignación_sustitución,
                    $fila->nuevo_beneficiario,
                    $fila->ci_nuevo_benef,
                    $fila->minuta_testimonio_folio,
                    $fila->observaciones3,
                ]);
            }

            fclose($handle);
        });

        // Encabezado para descarga
        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $fileName . '"');

        return $response;
    }
}
