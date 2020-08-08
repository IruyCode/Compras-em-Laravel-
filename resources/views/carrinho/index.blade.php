@extends('layouts.app')
@section('title','Carrinho de Compras')
<!-- Busca as extensoes -->
@section('content')

<div style="background-color: #fff "class="container">
    <div >
        <h3 style="color: green">Produtos no carrinho</h3>
        <hr/>
        @if($message = Session::get('success'))
      <div class="alert alert-success">
        {{$message}}
      </div>
     @endif
     @if(count($errors)>0)
  	<div class="alert alert-danger">
  		<ul>
  			@foreach($errors->all() as $error)
  			<li>{{$error}}</li>
  			@endforeach
  		</ul>
  	</div>
  	@endif
        <!-- Se a variavel pedido for vazia ele vai para o empty  a baixo do Cod-->
        <!-- Senao ele segue no form -->
        @forelse ($pedidos as $pedido)
        <div style="margin-right: 700px;margin-top: 30px;">
            <!-- Informa o pedido e a sua data de criacao ao apertar em comprar no produtos/show.blade.php -->
            <h5> Pedido: {{ $pedido->id }} </h5>
            <h5> Criado em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h5>
        </div>

            <table >
                <thead >
                    <tr>
                        <th></th>
                        <th>Qtd</th>
                        <th>Produto</th>
                        <th>Valor Unit.</th>
                        <th>Desconto(s)</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Atravez do blade usar php puro -->
                    @php
                        $total_pedido = 0;
                    @endphp
                    <!-- method criado do model pedido e vincular item ah item -->
                    @foreach ($pedido->pedido_produtos as $pedido_produto)

                    <tr>
                        <td>
                            <!-- Imagem cadastrada do produto -->
                            <img style="margin: 12px;"  width="150" height="150" src="{{url('img/produtos/'.md5($pedido_produto->produto->id).'.jpg')}}" alt="Imagem Produto" class="img-fluid img-thumbnail">
                        </td>
                        <td class="center-align">
                            <div class="center-align">
                                <a class="col l4 m4 s4" href="#" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 1 )">
                                    <i class="material-icons small">remove_circle_outline</i>
                                </a>
                                <!-- Sera criado 2 botoes 1 para adicionar e outro para remover um produto , feito com AJAX e JS -->
                                <span class="col l4 m4 s4"> {{ $pedido_produto->qtd }} </span>
                                <a class="col l4 m4 s4" href="#" onclick="carrinhoAdicionarProduto({{ $pedido_produto->produto_id }})">
                                    <i class="material-icons small">add_circle_outline</i>
                                </a>
                            </div>
                            <a href="#" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 0)" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Retirar produto do carrinho?">Retirar produto</a>
                        </td>
                        <!-- utilizando o metodo pedido produto , ira chamar o nome e o valor da dase de dados Produtos -->
                        <td> {{ $pedido_produto->produto->titulo }} </td>
                        <td>R$ {{ number_format($pedido_produto->produto->preco, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($pedido_produto->descontos, 2, ',', '.') }}</td>
                        @php
                            $total_produto = $pedido_produto->valores - $pedido_produto->descontos;
                            $total_pedido += $total_produto;
                        @endphp
                        <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row" style="margin-left: 500px;font-size: 20px;color: green;">
                <strong >Total do pedido: </strong>
                <span > € {{ number_format($total_pedido, 2, ',', '.') }}</span>
            </div>

            <div class="row form-group">
                <form method="POST" action="{{ route('carrinho.desconto') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                   <center> <strong   style="color: #00BFFF;" >Cupom de desconto: </strong><br></center>
                    <input  class="form-control" type="text" name="cupom"  placeholder="Introduza o Cod">
                    <button class="btn btn-primary" style="margin-left: 160px;margin-top: 10px;" >Validar</button>
                </form>

                    <form method="POST" action="{{ route('carrinho.concluir') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                    <button type="submit" class="btn btn-success" style="margin-left: 300px;height: 100px;width: 200px;margin-top: 10px;">
                        Concluir compra
                    </button>   
                </form>
            </div>
            <div class="row">
                <a class="btn-large tooltipped col l4 s4 m4 offset-l2 offset-s2 offset-m2"  style="margin:30px;" href="{{ route('home') }}"><button class="btn btn-danger">Continuar Comprando</button></a>
                
            
            </div>
        @empty
            <h5>Não há nenhum pedido no carrinho</h5>
        @endforelse
    </div>
</div>

<form id="form-remover-produto" method="POST" action="{{ route('carrinho.remover') }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input type="hidden" name="pedido_id">
    <input type="hidden" name="produto_id">
    <input type="hidden" name="item">
</form>

<form id="form-adicionar-produto" method="POST" action="{{ route('carrinho.adicionar') }}">
    {{ csrf_field() }}
    <input type="hidden" name="id">
</form>

@push('scripts')
    <script type="text/javascript" src="dist/js/carrinho.js"></script>
@endpush

@endsection