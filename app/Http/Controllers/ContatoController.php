<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContatoController extends Controller
{
  function index (){
    $date ['titulo'] = "Minha pagina de Contato ";
      return view ('contato.contato',$date);
  }
   public function enviar(Request $Request){ //recebe dados do formulario para enviar email
  	$dadosEmail = array (
  		'nome'=> $Request->input('nome'),
  		'email'=> $Request->input('email'),
  		'assunto'=> $Request->input('assunto'),
  		'msg'=> $Request->input('msg'));

  	Mail::send('contato.email.contato', $dadosEmail, function($message){//pasta email , dentro dela o contato , sera o template 
 
  		$message->from('yumex180@gmail.com','Formulario de Contato');//email que ira enviar a mensagem
  		$message->subject('Mensagem enviada pelo formulario de contato');//titulo da mensagem 
  		$message->to('vzx1red@gmail.com')->cc('yumex180@gmail.com');//email que ira receber a mensagem
  	});
  	 return redirect('contato')->with('success','Mensagem enviada, entraremos em contato logo !!!');
  }
}
