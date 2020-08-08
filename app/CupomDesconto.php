<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupomDesconto extends Model
// Significa que estes campos sao obrigatorios para utilizacao
{
     protected $fillable = [
        'nome',
        'localizador',
        'desconto',
        'modo_desconto',
        'limite',
        'modo_limite',
        'dthr_validade',
        'ativo'
    ];
}
