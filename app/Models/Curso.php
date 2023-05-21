<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $dates = ['ultimo_dia'];

    protected $fillable = [
        'titulo',
        'modalidad_id',
        'ultimo_dia',
        'descripcion',
        'user_id',
        'tipo',
        'cupos',
        'costo',
        'publicado'
    ];

    public function modalidad(){
        return $this->belongsTo(Modalidad::class);
    }

    public function cursantes(){
        return $this->hasMany(Cursante::class)->orderBy('created_at', 'DESC');
    }

    public function reclutador(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
