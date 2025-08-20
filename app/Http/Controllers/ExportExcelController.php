<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportExcelController extends Controller
{
    public function exportExcelDirecto(Request $request)
    {
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
                's.estado_social_sustit',
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
                'le.manzano as le_manzano',
                'le.lote as le_lote',
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

        if ($request->filled('departamento')) {
            $query->where('s.depto_id', $request->departamento);
        }
        if ($request->filled('proyecto')) {
            $query->where('s.proy_id', $request->proyecto);
        }

        $datos = $query->get();

        // NOMBRE ARCHIVO
        $filename = "reporte_social_credito_legal_" . date('Ymd_His') . ".xls";

        // CABECERAS PARA EXCEL
        $headers = [
            "Content-Type" => "application/vnd.ms-excel",
            "Content-Disposition" => "attachment; filename=\"$filename\"",
        ];

        // CONTENIDO HTML TABLA
        $contenido = '<table border="1"><thead><tr>';
        if (count($datos) > 0) {
            foreach ((array)$datos[0] as $columna => $valor) {
                $contenido .= '<th>' . htmlspecialchars($columna) . '</th>';
            }
            $contenido .= '</tr></thead><tbody>';
            foreach ($datos as $fila) {
                $contenido .= '<tr>';
                foreach ((array)$fila as $valor) {
                    $contenido .= '<td>' . htmlspecialchars($valor ?? '') . '</td>';
                }
                $contenido .= '</tr>';
            }
        } else {
            $contenido .= '<tr><td colspan="100%">No se encontraron resultados</td></tr>';
        }
        $contenido .= '</tbody></table>';

        return response($contenido, 200, $headers);
    }
}
