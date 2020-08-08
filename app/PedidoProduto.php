<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
  	 protected $fillable = [
    'pedido_id','produto_id', 'status', 'valor'
      ];
    public function produto()
    {
    	 return $this->belongsTo('App\Produtos', 'produto_id', 'id');//o metodo belongsTo serve para relacionar a chave estrangeira com a primaria .objeto direto //pesquisar na tabela produto sobre ele
}  
}
