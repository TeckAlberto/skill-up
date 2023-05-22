<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vacante_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function vacante(){
        return $this->belongsTo(Vacante::class);
    }
}
