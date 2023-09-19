<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCurso extends Model
{
    use HasFactory;

    //relacion uno a muchos inversa
    public function curso()
    {
        return $this->belongsTo('App\Models\Curso');
    }
}


