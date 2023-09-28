<?php

namespace App\Http\Controllers;

use App\Models\subCurso;
use App\Models\Cursos;
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
    }
    // public function show($id)
    // {
    //     $creado = subCurso::find($id)->get();
    //     if($creado->isEmpty()){
    //         $subcurso = new subCurso();
    //         $curso = Cursos::find($id);
    //         $subcurso->subtitulo = $curso->nombre_curso;
    //         $subcurso->descripcion = $curso->descripcion_curso;
    //         $subcurso->imagen = $curso->imagen_curso;
    //         $subcurso->video = $curso->url_video_curso;
    //         $subcurso->curso_id = $curso->id;
    //         $subcurso->save();
    //         $data = [
    //             'message' => 'SubCurso creado correctamente',
    //             'subcurso' => $subcurso
    //         ];
    //         $subcursos = subCurso::where('curso_id', $curso->id)->get();
    //         return response()->json([$subcurso,$curso,$subcursos,$data]);
    //     }
    //     $subcurso = subCurso::find($id);
    //     $curso = Cursos::find($subcurso->curso_id);
    //     $subcursos = subCurso::where('curso_id', $curso->id)->get();
    //     return response()->json([$subcurso,$curso,$subcursos]);
    // }
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

    public function edit($id)
    {
        $data = subCurso::find($id);
        return response()->json($data);
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
