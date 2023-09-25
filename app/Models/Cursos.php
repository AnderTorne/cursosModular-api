<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    // protected $fillable = [
    //     'titulo',
    //     'descripcion',
    //     'imagen',
    //     'activo'
    // ];
    //relacion uno a muchos
    public function subCursos()
    {
        // return $this->hasMany(SubCursos::class);
        return $this->hasMany('App\Models\subCurso');
    }
}
