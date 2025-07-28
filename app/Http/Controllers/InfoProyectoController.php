<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Social;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InfoProyectoController extends Controller
{
  public function index(Request $request)
  {

    $query = DB::table('extrasocial as s')
      ->join('extracreditos as c', 's.unid_hab_id', '=', 'c.unid_hab_id')
      ->join('extralegal as le', 's.unid_hab_id', '=', 'le.unid_hab_id')
      ->select([
        's.departamento',
        's.nombre_proyecto',
        's.manzano',
        's.lote',
        's.nombre_titular',
        's.ci_titular',
        's.ext_ci_titular',
        's.observaciones_detalles',
        's.nombre_beneficiario_final',
        's.ci_beneficiario_final',
        's.ext_ci_final',

        's.estado_social_benef_final',
        's.observacion_benef_final',
        's.telefono_final',
        'c.codigo_credito',
        'c.entidad_financiera',
        'c.nombre_beneficiario',
        'c.ci',
        'c.fono',
        'c.fecha_nacimiento',
        'c.monto_total_credito',
        'c.total_activado',
        'c.fecha_activacion',
        'c.estado_cartera',
        'c.observacion',
        'c.reestructurados',
        'le.nombre_apellidos',
        'le.cedula_identidad',
        'le.nro_folio_real',
        'le.estado_folio',
        'le.titulacion',
        'le.observaciones1',
        'le.levantam_grav_dev_documentos',
        'le.observado_ley850',
        'le.folio_nombre_aevivienda',
        'le.observaciones2',
        //'le.observaciones3 as OBSERVACIONES3',
      ]);
    $departamentos = DB::table('departamentos')->select('departamento_id', 'departamento')->orderBy('departamento')->get();
    $proyectos = DB::table('proyectos')->select('nombre_proy')->distinct()->get();


    if ($request->filled('nombre_beneficiario_final')) {
      $query->where('s.nombre_beneficiario_final', 'ILIKE', '%' . $request->nombre_beneficiario_final . '%');
    }
    if ($request->filled('ci_beneficiario_final')) {
      $query->where('s.ci_beneficiario_final', 'ILIKE', '%' . $request->ci_beneficiario_final . '%');
    }

    if ($request->filled('departamento')) {
      $query->where('s.departamento', 'ILIKE', '%' . $request->departamento . '%');
    }

    if ($request->filled('proyecto')) {
      $query->where('s.nombre_proyecto', 'ILIKE', '%' . $request->proyecto . '%');
    }

      $data = $query->orderBy('departamento')
                        ->paginate(10)
                        ->appends($request->query());




    return view('areas.infproyecto.index', compact('data', 'departamentos', 'proyectos'));
  }

  public function getProyectos(Request $request)
  {
    return DB::table('extrasocial')
      ->select('proy_id', 'nombre_proyecto')
      ->where('depto_id', $request->departamento)
      ->whereNotNull('proy_id')
      ->whereNotNull('nombre_proyecto')
      ->distinct()
      ->orderBy('nombre_proyecto')
      ->get();
  }
}
