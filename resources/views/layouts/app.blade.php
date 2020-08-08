<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts da pasta :Public/dist/js e /css -->
   <script type="text/javascript" src="{{URL::to('dist/js/jquery.min.js')}}"></script>
   <script type="text/javascript" src="{{URL::to('dist/css/bootstrap.min.css')}}"></script>
  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Scripts necessarios para o funcionamento correto do navbar -->
    <script src="{{URL::to('node/jquery/dist/jquery.js')}}" ></script>
    <script src="{{URL::to('node/popper.js/dist/popper.js')}}" ></script>
        <script src="{{URL::to('node/bootstrap/dist/js/bootstrap.js')}}" ></script>  
        <!-- Script para o icone de curti do facebook -->
        <script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
 
    <!-- Fontes -->
    <!-- link para icones no footer -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Fontes necessarios para o bootstrap -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{URL::to('dist/css/bootstrap.min.css')}}">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> 
    
    <!-- Styles para as estrela e outras formatacoes do site -->
      <link href="{{ asset('dist/css/estrela.css') }}" rel="stylesheet">
      <link href="{{ asset('dist/css/estilo_index.css') }}" rel="stylesheet">

 <style type="text/css">
  /*Para quando o a pagina é menor que 700px*/
  
    .zoom{
    overflow: hidden;
}
.zoom img{
    max-width: 100%;
    -moz-transition: all 0.3;
    transition: all 0.3;
}
.zoom:hover img{
    -moz-transform: scale(1.1);
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}

.grid1{
     display: grid;
     grid-template-columns: 1fr 1fr 1fr; /* Como se dividisse em 3 partes 33% */
     /* grid-template-columns: repeat(3,1fr);   A mesma coisa do cod de cima */
    max-width: 750px;
    margin: 0 auto;
    grid-gap: 20px;
    /* margem de 20px entre os produtos */
 }
 .grid1 > div:nth-child(n + 4){ /* significa que a partir do  quarto elemento (4) ele ira fazer a formatacao */
     /* Ira escolher um filho(a primeira div que encontrar)  */

display: grid;
grid-template-columns: 1fr 1fr;
 grid-gap: 10px;
 align-items: center;

 }
 .anuncio{
     grid-column: 1; 
     /* Fala para o anuncio ir para a primeira linha */
     grid-row:2/5 ;
     /* fala para ele pegar da 2º ate a 5º linha */
     border: 5px solid black;
     display: block;
 } 
}

@media only screen and (min-width: 770px) {
   .galeria{
  
    margin-top: 30px;
    margin-left: : 620px;
    width: 880px;
    height: 570px;
   
    overflow: hidden;
}
}



 

 @media(max-width: 600px){
     .grid1{
        grid-template-columns: repeat(2,1fr); 
     }
     .grid1 > div:nth-child(n + 1){
         display: block;
     }
 }
 

 </style>

</head>
<body style="background-color: #64FE2E">
    <div id="app">

      <!-- Serve para colocar o menu e uma linha -->
        <nav class="navbar navbar-expand-lg navbar-dark shadow p-4 mb-6 bg-success  rounded" >
<!-- style=" background-color:#A9F5F2" navbar-dark o texto fico em branco -->
            <div class="container" >
              <!-- Onde ira colocar o nome do projeto 'Zukaprodutos' h1 para realçar e mb-0 tirar margens -->
              <img  style="width: 90px;height: 90px;" src="{{url('img/logo/logooficial.png')}}" alt="Imagem Produto" class="img-fluid " >
             <a class="navbar-brand h1 mb-0" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
            </a>
            <!-- Serve para formatar o pagina de acordo com o tamanho -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
          </button>     

        <!-- Para colocar os links alinhadas  -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   
          <!-- No lado esquedo do Menu -->
             <ul class="navbar-nav mr-auto">
              <li> <a class="nav-link" href="{{ url('produtos/') }}"> Produtos</a></li>
                 <li> <a class="nav-link" href="{{ url('contato') }}">Contato</a></li>
            
             </ul>

                    <!-- Lado direito do Menu -->
             <ul class="navbar-nav ml-auto">

                        <!-- Altentificar links -->
                  @guest 
                        <!-- todo que esta dentro do guest , é quando nao esta logado -->
                 <li><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
                     @if (Route::has('register'))
                      <li class="nav-item">
                     <a class="nav-link" href="{{ route('register') }}">Cadastrar-se</a>
                        </li>
                   
                      @endif

                   @else
                        <!-- todo qe esta dentro do else , é após ter logado  -->
           
             <li class="nav-item dropdown">
                               
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

              <!-- A baixo é o icone do login -->
              <svg style="font-size: 30px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
                   {{ Auth::user()->name }} <span class="caret"></span>
                       </a>

                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }} </a>
                  
                   
                 
   

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                    </form>
                                     </div>
                   </li>
                      <li> <a class="nav-link" href="{{ url('carrinho') }}">

                <!-- Pagote do icone Carrinho de compras -->
                <svg style="font-size: 30px;margin-left: 10px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg> </a>
        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
            @yield('content')

        @if(!Auth::guest())
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hide">
                {{ csrf_field() }}
            </form>
        @endif
        </div>
        </main>
    </div>
 <hr/>
          <!-- Rodape do site -->
      <footer style="color: #fff;background-color: #28a745; " >
       
        <div class="logotipo">
      <img src="{{url('img/logo/logooficial.png')}}" alt="Imagem Produto" class="img-fluid " >
        <div style="color:#fff;margin-left: 30%; "><p>Site Criado por Yuri Banzato 3 TGPSI 2020</p></div>
        </div>
 
 <nav class="redes"> 
            <ul>
                <p style="margin-right: 200px;color: #fff;font-size: 18px; margin-top: 6px;">Nos siga nas redes sociais!!</p>

                <!-- Colocar o face e o curtir -->
                <div class="row">
                    <button style="margin-right:20px;color: #fff;" class="btn btn-primary"><span><a style="margin-right:5px;color: #fff;"  href="#" class="fa fa-facebook"></a>Facebook</span></button>

                    <fb:like  style="margin-top:20px;"  layout="standard" show-faces="true" width="200" action="like" colorscheme="light" /> 
                
                </div>
             
          </ul>
           <ul>
               
                <div class="row">
                <button style="margin-right:20px;color: #fff;" class="btn btn-warning"><span><a style="margin-right:5px;color: #fff;"  href="#" class="fa fa-instagram"></a>Instagram</span></button>
                </div>  
           </ul>
     </nav>
</footer> 

     @stack('scripts') 

</body>
</html>
