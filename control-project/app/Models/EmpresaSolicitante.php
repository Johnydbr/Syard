<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class EmpresaSolicitante extends Model
{
    protected $fillable = ['razao_social', 'cnpj'];

    // Uma empresa tem vários solicitantes
    public function solicitantes()
    {
        return $this->hasMany(Solicitante::class);
    }
}
