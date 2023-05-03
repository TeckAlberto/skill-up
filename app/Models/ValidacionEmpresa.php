<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidacionEmpresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'rfc',
        'telefono',
        'correo',
        'comprobante',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }




}
