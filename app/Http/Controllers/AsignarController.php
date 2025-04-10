<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignarController extends Controller
{
    public function index()
    {
        // Obtener unidades habitacionales no asignadas
        $unidades = DB::table('unidad_habitacional as uh')
            ->leftJoin('uh_asignada as uha', 'uh.unidad_habitacional_id', '=', 'uha.unidad_habitacional_id')
            ->leftJoin('beneficiarios as b1', 'uha.beneficiario_id', '=', 'b1.beneficiario_id')
            ->leftJoin('proyectos as p', 'uh.proyecto_id', '=', 'p.proyecto_id')
            ->leftJoin('departamentos as d', 'uh.departamento_id', '=', 'd.departamento_id')
            ->whereNull('uha.uh_asignada_id')
            ->select(
                'uh.unidad_habitacional_id',
                'd.departamento',
                'p.nombre_proy',
                'uh.manzano',
                'uh.lote',
                'uh.unidad_vecinal',
                'b1.nombres as beneficiario_nombre',
                'b1.cedula_identidad',
                'uh.proyecto_id', // Asegúrate de que `proyecto_id` esté seleccionado
                'uh.departamento_id' // Asegúrate de que `departamento_id` esté seleccionado
            )
            ->paginate(10);
        //return($unidades);

        return view('areas.asignar_act.index', compact('unidades'));
    }


    public function asignar(Request $request)
    {
        dd($request->all());
        //dump($request->all()); // 👈🏼 Revisa esto en tu navegador

        // Validar los campos
        $request->validate([
            'unidad_habitacional_id' => 'required|exists:unidad_habitacional,unidad_habitacional_id',
            'beneficiario_id' => 'required|exists:beneficiarios,beneficiario_id',
            'proyecto_id' => 'required|exists:proyectos,proyecto_id', // Asegúrate de que `proyecto_id` esté en el request
            'departamento_id' => 'required|exists:departamentos,departamento_id', // Asegúrate de que `departamento_id` esté en el request
        ]);

        // Obtener el valor máximo de `uh_asignada_id` de la tabla `uh_asignada`
        $maxUhasignadaId = DB::table('uh_asignada')->max('uh_asignada_id');

        // Si no se encuentra ningún ID (es decir, la tabla está vacía), asignar el valor inicial (puedes ajustar esto si es necesario)
        $maxUhasignadaId = $maxUhasignadaId ? $maxUhasignadaId + 1 : 1;

        // Insertar el nuevo registro en la tabla `uh_asignada`
        DB::table('uh_asignada')->insert([
            'uh_asignada_id' => $maxUhasignadaId,
            'unidad_habitacional_id' => $request->unidad_habitacional_id,
            'beneficiario_id' => $request->beneficiario_id,
            'proyecto_id' => $request->proyecto_id,
            'departamento_id' => $request->departamento_id,
            'created_at' => now(),
            'updated_at' => now(),


        ]);

        // Verifica si está insertando bien:
        dd("Asignación exitosa");


        // Redirigir a la página de formulario con un mensaje de éxito

        /* return redirect()
            ->route('asignar_act.formulario', ['id' => $request->unidad_habitacional_id])
            ->with('success', 'Unidad habitacional asignada correctamente.');*/
        // Redirigir con el ID de la asignación (uh_asignada_id) en lugar de unidad_habitacional_id
        return redirect()
            ->route('asignar_act.formulario', ['uh_asignada_id' => $maxUhasignadaId])
            ->with('success', 'Unidad habitacional asignada correctamente.');
    }

    public function formulario($uh_asignada_id)
    {
        $unidad = DB::table('unidad_habitacional as uh')
            ->leftJoin('departamentos as d', 'uh.departamento_id', '=', 'd.departamento_id')
            ->leftJoin('proyectos as p', 'uh.proyecto_id', '=', 'p.proyecto_id')
            ->where('uh.unidad_habitacional_id', $uh_asignada_id)
            ->select(
                'uh.unidad_habitacional_id',
                'uh.manzano',
                'uh.lote',
                'uh.unidad_vecinal',
                'uh.proyecto_id',
                'uh.departamento_id',
                'd.departamento'
            )
            ->first();

        $beneficiario = DB::table('beneficiarios')->get();

        return view('areas.asignar_act.asignar', [
            'unidades' => [$unidad], // Solo uno, pero estructura como array
            'beneficiario' => $beneficiario
        ]);
    }
}
