<!DOCTYPE html>
<html>

<head>
  <title>Fox carrinho</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="{{ asset('css/pedidos.css') }}" rel="stylesheet">
  <style>
    body {
      background-color: #F4EFEF;
    }

    .checkout-container-header {
      background-color: #43ADDA;
    }

    .cart-table td {
      vertical-align: middle;
    }
  </style>
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
          <img src="{{ asset('images/steps2.png') }}" alt="Imagem 1">
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
        <div class="col-8">
          <div class="bg-white p-4">
            <table class="table cart-table">
              <thead>
                <tr>
                  <th class="product-thumbnail"></th>
                  <th class="product-name">Produto</th>
                  <th class="product-price">Preço</th>
                  <th class="product-quantity">Quantidade</th>
                  <th class="product-subtotal">Subtotal</th>
                  <th class="product-remove"></th>
                </tr>
              </thead>

              
              <tbody>
                @foreach($itens as $item)
                <tr>
                  <td class="product-thumbnail d-flex justify-content-center">
                    @if($item->produto->imagens->isNotEmpty())
                    <img src="{{ $item->produto->imagens->first()->IMAGEM_URL }}" alt="{{ $item->produto->PRODUTO_NOME }}" style="min-height: 70px; max-height: 70px; object-fit: contain;">
                    @else
                    <img src="https://multilit.com.br/wp-content/uploads/2020/03/Produto-sem-foto.png" alt="Produto sem imagem"
                    style="min-height: 70px; max-height: 70px; object-fit: contain;">
                    @endif
                  </td>
                  <td class="product-name">{{ $item->produto->PRODUTO_NOME }}</td>
                  <td class="product-price">R$
                    {{ number_format($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO, 2, ',', '.') }}
                  </td>

                  <td class="product-quantity">
                  <div class="quantity d-flex align-items-center my-1">
                    <form action="{{ route('carrinho.atualizarItem') }}" method="POST" class="d-inline">
                      @csrf
                      <input type="hidden" name="USUARIO_ID" value="{{ $item->USUARIO_ID }}">
                      <input type="hidden" name="PRODUTO_ID" value="{{ $item->PRODUTO_ID }}">
                      <input type="hidden" name="ITEM_QTD" value="{{ $item->ITEM_QTD - 1 }}">
                      <button type="submit" class="minus-btn btn btn-sm mr-1" style="background-color: #43ADDA; color:white" {{ $item->ITEM_QTD <= 1 ? 'disabled' : '' }}>-</button>
                    </form>

                    <input type="text" name="item_qtd" class="form-control text-center mx-1" value="{{ $item->ITEM_QTD }}" readonly>

                    <form action="{{ route('carrinho.atualizarItem') }}" method="POST" class="d-inline">
                      @csrf
                      <input type="hidden" name="USUARIO_ID" value="{{ $item->USUARIO_ID }}">
                      <input type="hidden" name="PRODUTO_ID" value="{{ $item->PRODUTO_ID }}">
                      <input type="hidden" name="ITEM_QTD" value="{{ $item->ITEM_QTD}}">
                      <button type="submit" class="plus-btn btn btn-sm ml-1" style="background-color: #43ADDA; color:white">+</button>
                    </form>
                  </div>
                </td>


                  <td class="product-subtotal">R$
                    {{ number_format(($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO) * $item->ITEM_QTD, 2, ',', '.') }}
                  </td>
                  
                  <td class="product-remove">
                  <form action="{{ route('carrinho.removerItem') }}" method="POST">
                    @csrf
                    <input type="hidden" name="USUARIO_ID" value="{{ $item->USUARIO_ID }}">
                    <input type="hidden" name="PRODUTO_ID" value="{{ $item->PRODUTO_ID }}">
                    <button type="submit" class="btn btn-danger btn-sm">X</button>
                  </form>
                </td>

                </tr>
                @endforeach
              </tbody>

            </table>
          </div>

          <div class="bg-white p-4 mt-5">
            <h3>Entrega</h3>
            <label for="cep-calculate">CEP
              <input id="cep-calculate" type="text" class="d-block">
              <button>CALCULAR</button>
            </label>
            <a class="d-block" href="#">Não sei meu cep.</a>
          </div>

        </div>
        <div class="col-4">
          <div class="bg-light p-4">
            <div class="cupom-area">
              <label for="cupom">
                Cupom de desconto
                <input type="text" id="cupom">
              </label>
              <button>Aplicar</button>
            </div>
            <table>
              <tr>
                <td>Subtotal:</td>
                <td>
                 
                </td>
              </tr>
              <tr>
                <td>Frete:</td>
                <td>R$ 10,00</td>
              </tr>
              <tr>
                <td>Total:</td>
                <td></td>
              </tr>
            </table>
            <a href="{{ route('carrinho.checkout') }}">FINALIZAR A COMPRA</a>
                     
            @if (session('error'))
                  <div class="alert alert-danger">
                      {{ session('error') }}
                  </div>
              @endif

          </div>

          <p><a href="">Continuar comprando</a></p>

        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/show.js') }}"></script>

</body>

</html>