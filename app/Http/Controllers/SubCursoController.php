<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use App\Models\subCurso;
use Illuminate\Http\Request;

class SubCursoController extends Controller
{
    public function index()
    {
        $subcurso = subCurso::all(); 
        return response()->json($subcurso);
        // $subcurso = subCurso::all();
        // return response()->json($subcurso);
    }

    public function show($id)
    {
        $subcurso= subCurso::find($id);
        $curso = Cursos::find($subcurso->curso_id);
        $subcursos = subCurso::where('curso_id', $curso->id)->get();
        return response()->json([$subcurso,$curso,$subcursos]);
        // return response()->json($subcurso);
        // $subcursos = subCurso::where('curso_id', $curso->id)->get();
        // return response()->json($curso);
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $subcurso = new subCurso();
        $subcurso->subtitulo = $request->subtitulo;
        $subcurso->descripcion = $request->descripcion;
        $subcurso->imagen = $request->imagen;
        $subcurso->video = $request->video;
        $subcurso->curso_id = $request->curso_id;
        $subcurso->save();
        $data = [
            'message' => 'SubCurso creado correctamente',
            'subcurso' => $subcurso
        ];
        return response()->json($data);
    }

    public function edit(subCurso $subCurso)
    {
        return response()->json($subCurso);
    }

    public function update(Request $request, subCurso $subcurso)
    {
        $subcurso->subtitulo = $request->subtitulo;
        $subcurso->descripcion = $request->descripcion;
        $subcurso->imagen = $request->imagen;
        $subcurso->video = $request->video;
        $subcurso->save();
        $data = [
            'message' => 'SubCurso actualizado correctamente',
            'subcurso' => $subcurso
        ];
        return response()->json($data);
    }

    public function destroy(subCurso $subcurso)
    {
        $subcurso->delete();
        $data = [
            'message' => 'Curso eliminado correctamente',
            'curso' => $subcurso
        ];
        return response()->json($data);
    }

    public function attach(Request $request){
        $subcurso = subCurso::find($request->id);
        $subcurso->cursos()->attach($request->curso_id);
        $data = [
            'message' => 'SubCurso asociado correctamente',
            'subcurso' => $subcurso
        ];
        return response()->json($data);
    }

    public function detach(Request $request){
        $subcurso = subCurso::find($request->id);
        $subcurso->cursos()->detach($request->curso_id);
        $data = [
            'message' => 'SubCurso desasociado correctamente',
            'subcurso' => $subcurso
        ];
        return response()->json($data);
    }
}
