<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    	protected $fillable = [//campos obrigatorios para pedido
    'user_id','status'
      ];

	public function pedido_produtos()
	{ 
    // ira criar um relacionameto entre a tabela pedido e pedido produto
    return $this->hasMany('App\PedidoProduto')// 1 para muitos é o hasMany
      ->select( \DB::raw('produto_id,sum(valor) as valores, count(1) as qtd'))//somar atraves do sum e mostrar quantos registros ira ter
    ->groupBy('produto_id')//raw chamar apenas os campos pedidos , nao chamar todos.
     ->orderBy('produto_id','desc'); //ultimos produtos no carrinho
     
    }
     public function pedido_produtos_itens()
    {
        return $this->hasMany('App\PedidoProduto');
    } // um pedido para varios pedidos produtos
   
    public static function consultaId($where)
    {
       $pedido = self::where($where)->first(['id']);//pesquisa o primeiro registro , retorna apenas o ID
       return !empty($pedido->id) ? $pedido->id : null;//se o atributo for atribuido e nao for vazio 
    }

}
