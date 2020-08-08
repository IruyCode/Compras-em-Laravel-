<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDelete;
class Produtos extends Model
{
 //use SoftDeletes;
 //protected $dates = ['deleted_at'];
 
    public function mostrarComentarios(){
    	return $this->hasMany('App\Comentario','produto_id','id');
    }
    // esta é a relacao entre elas 
   public function estrelas(){
    	return $this
    	->hasMany('App\Estrelas','id_produto','id'); // relacionamento de 1 para muitos onde
//return $this->hasMany('Comment', 'foreign_key', 'local_key');
      $med = DB::Table('Estrelas')->avg('qnt_produtos');
  
    }
   
}