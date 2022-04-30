<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracoes extends Model
{
    use HasFactory;

    public function getKeyToValues(){
        $configuracoes = Configuracoes::all();
        $configs = [];
        foreach ($configuracoes as $key => $valor)     {
            $configs += ['id' => $valor['id']];
            $configs += [$valor['propriedade'] => $valor['valor']];
        }
        return $configs;
    }
}
