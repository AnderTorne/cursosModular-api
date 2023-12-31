<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use App\Models\subCurso;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curso = Cursos::all();
        return response()->json($curso);
    }

    /**
     * Display a listing of the resource.
     */
    public function indexSubCurso()
    {
        $curso = subCurso::all();
        return response()->json($curso);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $curso = new Cursos();
        $curso->nombre_curso = $request->nombre_curso;
        $curso->descripcion_curso = $request->descripcion_curso;
        $curso->categoria_curso = $request->categoria_curso;
        $curso->precio_curso = $request->precio_curso;
        $curso->url_video_curso = $request->url_video_curso;
        $curso->imagen_curso = $request->imagen_curso;
        $curso->save();
        $data = [
            'message' => 'Curso creado correctamente',
            'curso' => $curso
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cursos $curso)
    {
        $creado = subCurso::where('curso_id', $curso->id)->get();
        if ($creado->isEmpty()) {
            $subcurso = new subCurso();
            $subcurso->subtitulo = $curso->nombre_curso;
            $subcurso->descripcion = $curso->descripcion_curso;
            $subcurso->imagen = $curso->imagen_curso;
            $subcurso->video = $curso->url_video_curso;
            $subcurso->curso_id = $curso->id;
            $subcurso->save();
            $data = [
                'message' => 'SubCurso creado correctamente',
                'subcurso' => $subcurso
            ];
            $subcursos = subCurso::where('curso_id', $curso->id)->get();
            // return response()->json([$curso, $subcursos,$data]);
            
            return response()->json([$subcurso, $curso, $subcursos]);
        }
        $subcurso = subCurso::where('curso_id', $curso->id)->first();
        $subcursos = subCurso::where('curso_id', $curso->id)->get();
        return response()->json([$subcurso, $curso, $subcursos]);
        // return response()->json($curso);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cursos $curso)
    {
        return response()->json($curso);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cursos $curso)
    {
        $curso->nombre_curso = $request->nombre_curso;
        $curso->descripcion_curso = $request->descripcion_curso;
        $curso->categoria_curso = $request->categoria_curso;
        $curso->precio_curso = $request->precio_curso;
        $curso->url_video_curso = $request->url_video_curso;
        $curso->imagen_curso = $request->imagen_curso;
        $curso->save();
        $data = [
            'message' => 'Curso actualizado correctamente',
            'curso' => $curso
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cursos $curso)
    {
        $curso->delete();
        $data = [
            'message' => 'Curso eliminado correctamente',
            'curso' => $curso
        ];
        return response()->json($data);
    }
}

// {
//     "nombre_curso":"Running",
//     "descripcion_curso":"run",
//     "categoria_curso":"Deporte",
//     "precio_curso":300,
//     "url_video_curso":"kwjyaP8wP5c",
//     "imagen_curso":"https://hips.hearstapps.com/hmg-prod/images/running-is-one-of-the-best-ways-to-stay-fit-royalty-free-image-1036780592-1553033495.jpg?crop=0.668xw:1.00xh;0.260xw,0&resize=1200:*"
// }
