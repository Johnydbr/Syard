<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    protected $fillable = [
        'solicitante_id', 'pesquisado_id', 'tipo_caso', 'data_abertura', 'data_finalizado'
    ];

    // Converte automaticamente para datas do Carbon no Laravel
    protected $casts = [
        'data_abertura' => 'date',
        'data_finalizado' => 'date',
    ];

    // Um caso pertence a um solicitante
    public function solicitante()
    {
        return $this->belongsTo(Solicitante::class);
    }

    // Um caso pertence a um pesquisado
    public function pesquisado()
    {
        return $this->belongsTo(Pesquisado::class);
    }
}
