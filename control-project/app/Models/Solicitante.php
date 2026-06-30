<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    protected $fillable = ['nome', 'email', 'contato', 'empresa_solicitante_id'];

    // Um solicitante pertence a uma empresa
    public function empresaSolicitante()
    {
        return $this->belongsTo(EmpresaSolicitante::class);
    }

    // Um solicitante tem vários casos
    public function casos()
    {
        return $this->hasMany(Caso::class);
    }
}
