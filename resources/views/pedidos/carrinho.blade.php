<!DOCTYPE html>
<html>

<head>
  <title>Meu carrinho</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="{{ asset('css/pedidos.css') }}" rel="stylesheet">

  <!-- importando jquery para ajax -->
  <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous">
  </script>
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
          <div class="w-100">
            <div class="steps-line"></div>
            <div class="steps-btns d-flex justify-content-between">
              <div class="step-item selected text-center">
                <div class="step-circle mx-auto">1</div>
                <span class="step-label mt-1 d-block">Carrinho</span>
              </div>
              <div class="step-item text-center">
                <a href="{{ route('checkout.dadospessoais') }}">
                  <div class="step-circle mx-auto">2</div>
                  <span class="step-label mt-1 d-block">Dados pessoais</span>
                </a>
              </div>
              <div class="step-item text-center">
                <div class="step-circle mx-auto">3</div>
                <span class="step-label mt-1 d-block">Entrega</span>
              </div>
              <div class="step-item text-center">
                <div class="step-circle mx-auto">4</div>
                <span class="step-label mt-1 d-block">Pagamento</span>
              </div>
            </div>
          </div>
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
        

        @if($itens->count()>0)  

        <div class="col-8">
          <div class="bg-white px-4 pt-4 pb-2 container-box">

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
                @php
                  $subtotal = 0;
                @endphp

                @foreach($itens as $item)
                <tr id="item-row-{{ $item->PRODUTO_ID }}">
                  <td class="product-thumbnail d-flex justify-content-center">
                    @if($item->produto->imagens->isNotEmpty())
                    <img src="{{ $item->produto->imagens->first()->IMAGEM_URL }}" alt="{{ $item->produto->PRODUTO_NOME }}" style="min-height: 70px; max-height: 70px; object-fit: contain;">
                    @else
                    <img src="https://multilit.com.br/wp-content/uploads/2020/03/Produto-sem-foto.png" alt="Produto sem imagem"
                    style="min-height: 70px; max-height: 70px; object-fit: contain;">
                    @endif
                  </td>
                  <td class="product-name">{{ $item->produto->PRODUTO_NOME }}</td>
                  <td class="product-price text-nowrap">R$
                    {{ number_format($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO, 2, ',', '.') }}
                  </td>

                  <td class="product-quantity">
                  <div class="quantity d-flex align-items-center my-1">

                    <!-- formulario para diminuir quantidade de produto -->
                    <form action="{{ route('carrinho.atualizarItem') }}" method="POST" class="d-inline-block plus-btn-form">
                      @csrf
                      <input type="hidden" name="USUARIO_ID" value="{{ $item->USUARIO_ID }}">
                      <input type="hidden" name="PRODUTO_ID" value="{{ $item->PRODUTO_ID }}">
                      <input type="hidden" name="ITEM_QTD" id="decrement-{{ $item->PRODUTO_ID }}" value="{{ $item->ITEM_QTD - 1 }}">
                      <button type="submit" class="minus-btn btn btn-sm mr-1" {{ $item->ITEM_QTD <= 1 ? 'disabled' : '' }}>-</button>
                    </form>

                    <!-- mostrar valor que esta no input -->
                    <input type="text" id="item-qtd-{{ $item->PRODUTO_ID }}" name="item_qtd" class="form-control text-center mx-1 item-qtd-input" value="{{ $item->ITEM_QTD }}" readonly>

                    <!-- formulario para aumentar quantidade de produto -->
                    <form action="{{ route('carrinho.atualizarItem') }}" method="POST" class="d-inline-block plus-btn-form">
                      @csrf
                      <input type="hidden" name="USUARIO_ID" value="{{ $item->USUARIO_ID }}">
                      <input type="hidden" name="PRODUTO_ID" value="{{ $item->PRODUTO_ID }}">
                      <input type="hidden" name="ITEM_QTD" id="increment-{{ $item->PRODUTO_ID }}" value="{{ $item->ITEM_QTD + 1 }}">
                      <button type="submit" class="plus-btn btn btn-sm ml-1">+</button>
                    </form>
                  </div>
                </td>

                  <td class="product-subtotal text-nowrap">R$
                    {{ number_format(($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO) * $item->ITEM_QTD, 2, ',', '.') }}
                  </td>
                  
                  <td class="product-remove">
                    <form action="{{ route('carrinho.removerItem') }}" method="POST" class="removerCarrinho">
                      @csrf
                      <input type="hidden" name="USUARIO_ID" value="{{ $item->USUARIO_ID }}">
                      <input type="hidden" name="PRODUTO_ID" value="{{ $item->PRODUTO_ID }}">
                      <button type="submit" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                        </svg>
                      </button>
                    </form>
                  </td>
                </tr>

                @php
                  $subtotal += ($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO) * $item->ITEM_QTD;
                @endphp

                @endforeach
              </tbody>
            </table>
          </div>

          <div class="bg-white p-4 mt-5 container-box">
            <h3  class="mb-3">Entrega</h3>
            <label for="cep-calculate">CEP
              <div class="my-1">
                <input id="cepInput" type="text" class="d-inline-block" placeholder="00000-000" maxlength="9">
                <button type="button" class="btn-calculate ms-1" id="calculateButton">CALCULAR</button>
              </div>
            </label>
            <div id="freteResult" class="mt-1 mb-3"></div>
            <a class="d-block" href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank">Não sei meu cep.</a>

            
          </div>

        </div>
        <div class="col-4">
          <div class="bg-white py-4 container-box">
            <div class="cupom-area px-4 pb-2">
              <label for="cupom">
                Cupom de desconto
                <div class="mt-1 mb-2 d-flex justify-content-between">
                  <input type="text" id="cupom">
                  <button class="btn-calculate">Aplicar</button>
                </div>
              </label>
            </div>
            <table class="table">
              <tr>
                <td class="ps-4 text-secondary border-top">Subtotal:</td>
                <td class="pe-4 text-secondary border-top text-end">R$ {{ number_format($subtotal, 2, ',', '.') }}
                 
                </td>
              </tr>
              <tr>
                <td class="ps-4 text-secondary">Frete:</td>
                <td class="pe-4 text-secondary text-end">R$ 10,00</td>
              </tr>
              <tr>
                <td class="ps-4 border-0 cart-table-total">Total:</td>
                <td class="pe-4 border-0 cart-table-total text-end">R$ {{ number_format($subtotal + 10, 2, ',', '.') }}</td>
              </tr>
            </table>
            <div class="text-center mt-3">
              <a class="pedido-btn d-inline-block" href="{{ route('checkout.dadospessoais') }}">FINALIZAR A COMPRA</a>
            </div>
                     
            @if (session('error'))
                  <div class="alert alert-danger">
                      {{ session('error') }}
                  </div>
              @endif

          </div>

          <p class="text-center mt-3">
            <a class="btn-back-to-store" href="/">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
              </svg> 
              Continuar comprando
            </a>
          </p>

        </div>
        
        @else

        <div class="col-12">
          <div class="bg-white px-4 py-4 container-box">
              <h2>Seu carrinho está vazio!</h2>
              <p>Volte à loja e adicione produtos ao seu carrinho.</p>
              <a class="btn-back-to-store" href="/">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
              </svg> 
              Ir para a loja
            </a>
          </div>
        </div>

        @endif
      </div>
    </div>
  </div>

  <script src="{{ asset('js/carrinho.js') }}"></script>
  <script src="{{ asset('js/cep.js') }}"></script>
  <script src="{{ asset('js/ajax.js') }}"></script>

</body>

</html>