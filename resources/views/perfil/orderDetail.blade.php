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

<h1>Detalhes do Pedido #{{ $pedido->PEDIDO_ID }}</h1>
<h2>Informações do Usuário</h2>
    <p>Nome: {{ $user->USUARIO_NOME }}</p>

    <p>Status: {{ $pedido->status->STATUS_DESC }}</p>
    <p>Data do Pedido: {{ \Carbon\Carbon::parse($pedido->PEDIDO_DATA)->format('d/m/Y') }}</p>

    <h2>Endereço de Envio</h2>
    @if($endereco)
        <p>{{ $endereco->ENDERECO_LOGRADOURO }}, {{ $endereco->ENDERECO_NUMERO }}</p>
        <p>{{ $endereco->ENDERECO_COMPLEMENTO }}</p>
        <p>{{ $endereco->ENDERECO_CIDADE }}, {{ $endereco->ENDERECO_ESTADO }}</p>
        <p>CEP: {{ $endereco->ENDERECO_CEP }}</p>
    @else
        <p>Endereço não encontrado.</p>
    @endif

    <h2>Itens do Pedido</h2>
    <ul>
        @foreach ($pedido->itens as $item)
            <li>
                Produto: {{ $item->produto->NOME_PRODUTO }}
                <br>
                Quantidade: {{ $item->ITEM_QTD }}
                <br>
                Preço por Unidade: R$ {{ number_format($item->ITEM_PRECO, 2, ',', '.') }}
                <br>
                Desconto: -R$ {{ number_format($item->descontoEmReais, 2, ',', '.') }}
                <br>
                @if ($item->produto->imagens->isNotEmpty())
                    <img src="{{ $item->produto->imagens->first()->IMAGEM_URL }}" alt="Imagem do produto" style="max-width: 100px;">
                @endif
            </li>
        @endforeach
    </ul>

    <h2>Resumo do Pedido</h2>
    <p>Preço Total Bruto: R$ {{ number_format($pedido->totalPrecoBruto, 2, ',', '.') }}</p>
    <p>Desconto Total: R$ {{ number_format($pedido->totalDesconto, 2, ',', '.') }}</p>
    <p>Preço Total com Desconto: R$ {{ number_format($pedido->totalPrecoComDesconto, 2, ',', '.') }}</p>

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