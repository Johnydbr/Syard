<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pesquisado extends Model
{
    protected $fillable = ['nome', 'documento', 'tipo_de_pesquisado'];

    // Um pesquisado pode estar em vários casos
    public function casos()
    {
        return $this->hasMany(Caso::class);
    }
}
