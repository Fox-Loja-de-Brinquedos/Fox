<!DOCTYPE html>
<html lang="en">
<head>
<title>Fox Store - Loja de brinquedos</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="icon" href="{{ asset('images/logo-fox.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/orderDetail.css">
</head>
<body>

<header>
    <ul class="nav justify-content-between align-items-center">
      <li class="nav-item"> <a href="/orderList" class="voltar-a-loja"> <img src="\images\de-volta.png" alt="" width="23px" height="20px"> Minha conta</a></li>
      <li class="nav-item"><img src="\images\fox1.svg" alt="" width="116px" height="122px"></li>
      <li class="nav-item"><img src="\images\seguro.png" alt="" width="23px" height="20px">Ambiente 100% seguro</li>
    </ul>
<hr>
</header>

<main>

    <div class="details">
        <h1 class="orderId">Pedido #{{ $pedido->PEDIDO_ID }}</h1>
        <h2 class="detailsTitle">Detalhes do Pedido</h2>

        <div class="orderData">
        <p><span>Data:</span> {{ \Carbon\Carbon::parse($pedido->PEDIDO_DATA)->format('d/m/Y') }}</p>
        <p><span>Status:</span> {{ $pedido->status->STATUS_DESC }}</p>
        <p><span>Pagamento:</span> Aguardando</p>
        </div>

        <div class="orderAddress">
        <p class="titleAddress">Endereço de Envio:</p>
        <p>{{ $user->USUARIO_NOME }}</p>
        <p>{{ $pedido->endereco->ENDERECO_LOGRADOURO }}, {{ $pedido->endereco->ENDERECO_NUMERO }}</p>
        <p>{{ $pedido->endereco->ENDERECO_COMPLEMENTO }}, {{ $pedido->endereco->ENDERECO_CEP }}</p>
        <p>{{ $pedido->endereco->ENDERECO_CIDADE }}, {{ $pedido->endereco->ENDERECO_ESTADO }}</p>
        </div>
    </div>

    <div class="orderItem">

            <table>
                <div class="tableOrder">
                    <tr class="tableHead">
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Total</th>
                    </tr>

                    @foreach ($pedido->itens as $item)
                    <tr class="tableItem">
                      @if ($item->produto->imagens->isNotEmpty())
                        <td> <img src="{{ $item->produto->imagens->first()->IMAGEM_URL }}" alt="Imagem do produto">
                      @endif 
                        <span>{{ $item->produto->PRODUTO_NOME }}</span></td> 
                        <td class="preco">R$ {{ number_format($item->ITEM_PRECO, 2, ',', '.') }}</td>
                        <td class="qtd">{{ $item->ITEM_QTD }}</td>
                        <td>R$ {{ number_format($item->ITEM_PRECO * $item->ITEM_QTD, 2, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </div>
            </table>

        <div class="orderPrice">
            <p><span>DESCONTO:</span> -R${{ number_format($pedido->totalDesconto, 2, ',', '.') }}</p>
            <p><span>SUBTOTAL:</span> R$ {{ number_format($pedido->totalPrecoBruto, 2, ',', '.') }}</p>
            <p class="orderTotal">TOTAL: R$ {{ number_format($pedido->totalPrecoComDesconto, 2, ',', '.') }}</p>
        </div>
    </div>

</main>

<footer>
    <!--Receba promoções banner-->
    <div id="news-and-promotions-banner" class="container-fluid">
      <div class="row h-100 d-flex align-items-center justify-content-center">
        <div class="col col-4 fs-3 text-light fw-semibold">RECEBA PROMOÇÕES E NOVIDADES!</div>

        <div class="col col-4 d-flex justify-content-evenly">
          <input type="email" class="form-control text-us-input" placeholder="Seu nome">
          <input type="email" class="form-control text-us-input" placeholder="E-mail">
          <button type="button" class="btn btn-dark px-4">Enviar</button>
        </div>
      </div>
    </div>

    <div id="social-midia-footer" class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="col col-2 d-flex flex-column footer-column">
          <h3 class="fs-5 text-uppercase">Institucional</h3>
          <p>Sobre a marca</p>
          <p>Trocas e devoluções</p>
          <p>Políticas de privacidade</p>
          <p>Dúvidas frequentes</p>
        </div>
        <div class="col col-2 d-flex flex-column footer-column">
          <h3 class="fs-5 text-uppercase">Loja</h3>
          <p>Minha conta</p>
          <p>Meu carrinho</p>
          <p>Meus pedidos</p>
        </div>
        <div class="col col-2 d-flex flex-column footer-column">
          <h3 class="fs-5 text-uppercase">Redes Sociais</h3>
          <div class="d-flex justify-content-start mb-4">
            <img src="{{ asset('images/facebook.png') }}" class="footer-icon-resize me-2" alt="Icone Facebook">
            <p class="m-0">@lojafoxbrinquedos</p>
          </div>

          <div class="d-flex justify-content-start">
            <img src="{{ asset('images/instagram.png') }}" class="footer-icon-resize me-2" alt="Icone Instagram">
            <p class="m-0">@lojafoxbrinquedos</p>
          </div>
        </div>
        <div class="col col-2 footer-column">
          <h3 class="fs-5 text-uppercase">Formas de pagamento</h3>
          <img src="{{ asset('images/cartao-footer.png') }}" alt="Cartões aceitos na loja">
        </div>
      </div>
    </div>

    <hr>
    <div id="copyright-footer" class="container-fluid d-flex mb-3 mt-3 justify-content-between align-items-center">
      <a href="#">
        <img src="{{ asset('images/fox.png') }}" alt="Logo Fox" class="object-fit-contain ms-3" width="65px">
      </a>
      <i>
        <p>Fox Store © 2024 - Todos os direitos reservados</p>
      </i>
      
      <a href="#"><img src="{{ asset('images/whatsapp.png') }}" alt="Logo WhatsApp" class="object-fit-contain me-3 mb-3 position-fixed bottom-0 end-0" width="58px">
      </a>
    </div>
  </footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>