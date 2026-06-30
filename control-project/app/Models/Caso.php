<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    protected $fillable = [
        'solicitante_id', 'pesquisado_id', 'tipo_caso', 'data_abertura', 'data_finalizado',
        'entrevista', 'copia_hd', 'copia_celular', 'monitoramento', 'pesquisa_campo'
    ];

    protected $casts = [
        'data_abertura'   => 'date',
        'data_finalizado' => 'date',
        'entrevista'      => 'boolean',
        'copia_hd'        => 'boolean',
        'copia_celular'   => 'boolean',
        'monitoramento'   => 'boolean',
        'pesquisa_campo'  => 'boolean',
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
