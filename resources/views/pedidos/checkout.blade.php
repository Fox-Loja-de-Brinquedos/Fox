<!DOCTYPE html>
<html>

<head>
    <title>Finalizar compra</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('css/pedidos.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid checkout-container-header">
        <header class="container py-4">
            <div class="row">
                <div class="col-3">
                    <a href="/">
                        <img src="{{ asset('images/logo-fox-carrinho.png') }}" alt="Logo" class="img-fluid">
                    </a>
                </div>
                <div class="col-6 d-flex align-content-center flex-wrap">
                    <img src="{{ asset('images/steps-identificacao.png') }}" alt="Imagem 1">
                </div>
                <div class="col-3 text-end">
                    <img src="{{ asset('images/icone-seguro.png') }}">
                </div>
            </div>
        </header>
    </div>

    <div class="container-fluid checkout-container-body">
        <div class="container mt-5">
            <div class="row gx-5">
                <div class="col-7">
                    <form action="{{ route('pedido.finalizar') }}" method="POST">
                        @csrf
                        <div class="bg-white p-4 container-box">
                            <h3>Entrega</h3>
                            <p>Solicitamos apenas informações essenciais</p>
                            <div id="entrega">
                                @if($endereco)
                                <input type="hidden" name="ENDERECO_ID" value="{{ $endereco->ENDERECO_ID }}">
                                <label for="cep">CEP
                                    <input type="text" name="cep" id="cep" class="input-1-1" value="{{ $endereco->ENDERECO_CEP }}">
                                </label>
                                <label for="endereco">Endereço
                                    <input type="text" name="endereco" id="endereco" class="input-1-1" value="{{ $endereco->ENDERECO_LOGRADOURO }}">
                                </label>
                                <label for="numero">Número
                                    <input type="number" name="numero" id="numero" class="input-1-1" value="{{ $endereco->ENDERECO_NUMERO }}">
                                </label>
                                <label for="bairro">Bairro
                                    <input type="text" name="bairro" id="bairro" class="input-1-1" value="{{ $endereco->ENDERECO_COMPLEMENTO }}">
                                </label>
                                <label for="cidade">Cidade
                                    <input type="text" name="cidade" id="cidade" class="input-1-1" value="{{ $endereco->ENDERECO_CIDADE }}">
                                </label>
                                <label for="estado">Estado
                                    <input type="text" name="estado" id="estado" class="input-1-1" value="{{ $endereco->ENDERECO_ESTADO }}">
                                </label>
                                @else
                                <p>O usuário não tem um endereço cadastrado. Por favor, cadastre um endereço.</p>
                                @endif
                            </div>
                        </div>

                        <div class="bg-white p-4 my-5 container-box">
                            <h3>Formas de pagamento</h3>
                            <p>Solicitamos apenas informações essenciais</p>
                            <div id="forma-de-pagamento">
                                <div class="mb-3"><input type="radio" name="boleto" id="boleto"><label for="boleto" class="opcao-pagamento"> Boleto</label></div>
                                <button type="submit">Finalizar Pedido</button>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="col-5">
                    <div class="bg-white pt-4 container-box">
                        <h3 class="px-4">Resumo da compra</h3>
                        <table class="table">
                            @php
                            $total = 0;
                            @endphp
                            @foreach($itens as $item)
                            @php
                            $subtotal = $item->ITEM_QTD * ($item->PRODUTO_PRECO - $item->PRODUTO_DESCONTO);
                            $total += $subtotal;
                            @endphp
                            <tr>
                                <td class="ps-4">
                                    @if($item->produto->imagens->isNotEmpty())
                                    <img src="{{ $item->produto->imagens->first()->IMAGEM_URL }}" alt="{{ $item->produto->PRODUTO_NOME }}" style="max-width: 80px; max-height: 80px; object-fit: contain;">
                                    @else
                                    <img src="https://multilit.com.br/wp-content/uploads/2020/03/Produto-sem-foto.png" alt="Produto sem imagem" style="max-width: 80px; max-height: 80px; object-fit: contain;">
                                    @endif
                                    <span>{{ $item->ITEM_QTD }}x</span>
                                </td>
                                <td>
                                    <p>{{ $item->produto->PRODUTO_NOME }}</p>
                                    <p>R$ {{ number_format($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO, 2, ',', '.') }}</p>
                                </td>
                                <td class="pe-4">R$ {{ number_format($subtotal, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-end">Total:</td>
                                <td class="pe-4">R$ {{ number_format($total, 2, ',', '.') }}</td>
                            </tr>
                        </table>

                        <table class="table resumo-table">
                            <tr>
                                <td class="ps-4">Subtotal:</td>
                                <td class="pe-4">R$ {{ $total }}</td>
                            </tr>
                            <tr>
                                <td class="ps-4">Frete:</td>
                                <td class="pe-4">R$ 10,00</td>
                            </tr>
                            <tr>
                                <td class="ps-4">Total:</td>
                                <td class="pe-4">R$ {{ $total + 10 }}</td>
                            </tr>
                        </table>

                    </div>

                    <p class="text-center"><a class="btn-back-to-store" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                            </svg> Continuar comprando</a></p>
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                </div>
            </div>
        </div>
    </div>


</body>

</html>