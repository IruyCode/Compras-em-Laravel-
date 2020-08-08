@extends('layouts.app')
@section('title','Carrinho de Compras')

@section('content')

<div  style="background-color: #fff;" >
    <div>
        <h3>Minhas compras</h3>
        @if (Session::has('mensagem-sucesso'))
            <div class="card-panel green">{{ Session::get('mensagem-sucesso') }}</div>
        @endif
        @if (Session::has('mensagem-falha'))
            <div class="card-panel red">{{ Session::get('mensagem-falha') }}</div>
        @endif
        <div class="divider"></div>
        <div class=" col s12 m12 l12">
            <h3 style="color: green">Compras concluídas</h3>
            @forelse ($compras as $pedido)
                <h5 class="col l6 s12 m6"> Pedido: {{ $pedido->id }} </h5>
                <h5 class="col l6 s12 m6"> Criado em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h5>
                <form method="POST" action="{{ route('carrinho.cancelar') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2"></th>
                                <th>Produto</th>
                                <th>Valor</th>
                                <th>Desconto</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $total_pedido = 0;
                        @endphp
                        @foreach ($pedido->pedido_produtos_itens as $pedido_produto)
                            @php
                                $total_produto = $pedido_produto->valor - $pedido_produto->desconto;
                                $total_pedido += $total_produto;
                            @endphp
                            <tr>
                                <td class="center">
                                    @if($pedido_produto->status == 'PA')
                                        <p class="center">
                                            <input type="checkbox" id="item-{{ $pedido_produto->id }}" name="id[]" value="{{ $pedido_produto->id }}" />
                                            <label for="item-{{ $pedido_produto->id }}">Selecionar</label>
                                        </p>
                                    @else
                                        <strong class="red-text">CANCELADO</strong>
                                    @endif
                                </td>
                                <td>
                                  <img width="200" height="200"  src="{{url('img/produtos/'.md5( $pedido_produto->produto->id).'.jpg')}}" alt="Imagem Produto" class="img-fluid img-thumbnail">
                                </td>
                                <td>{{ $pedido_produto->produto->titulo }}</td>
                                <td>R$ {{ number_format($pedido_produto->valor, 2, ',', '.') }}</td>
                                <td>R$ {{ number_format($pedido_produto->desconto, 2, ',', '.') }}</td>
                                <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td><strong>Total do pedido</strong></td>
                                <td>R$ {{ number_format($total_pedido, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button style="margin: 20px;width: 200px;" type="submit" class="btn btn-outline-danger" data-position="bottom"  data-tooltip="Cancelar itens selecionados">
                                        Cancelar
                                    </button>   
                                </td>
                                <td colspan="3"></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            @empty
                <h5 class="center">
                    @if ($cancelados->count() > 0)
                        Neste momento não há nenhuma compra valida.
                    @else
                        Você ainda não fez nenhuma compra.
                    @endif
                </h5>
            @endforelse
        </div>
        <div class="col s12 m12 l12">
            <div class="divider"></div>

            <h3 style="color: red">Compras canceladas</h3>
            @forelse ($cancelados as $pedido)
            <div style="margin-top: 30px;">
                <h5 class="col l2 s12 m2"> Pedido: {{ $pedido->id }} </h5>
                <h5 class="col l5 s12 m5"> Criado em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h5>
                <h5 class="col l5 s12 m5"> Cancelado em: {{ $pedido->updated_at->format('d/m/Y H:i') }} </h5>
            </div>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Produto</th>
                            <th>Valor</th>
                            <th>Desconto</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_pedido = 0;
                        @endphp
                        @foreach ($pedido->pedido_produtos_itens as $pedido_produto)
                            @php
                                $total_produto = $pedido_produto->valor - $pedido_produto->desconto;
                                $total_pedido += $total_produto;
                            @endphp
                        <tr>
                            <td>
                                <img width="200" height="200"  src="{{url('img/produtos/'.md5( $pedido_produto->produto->id).'.jpg')}}" alt="Imagem Produto" class="img-fluid img-thumbnail">

                            </td>
                            <td>{{ $pedido_produto->produto->titulo }}</td>
                            <td>R$ {{ number_format($pedido_produto->valor, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($pedido_produto->desconto, 2, ',', '.') }}</td>
                            
                            <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>Total do pedido</strong></td>
                            <td>R$ {{ number_format($total_pedido, 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            @empty
                <h5 class="center">Nenhuma compra ainda foi cancelada.</h5>
            @endforelse
        </div>
    </div>

</div>

@endsection