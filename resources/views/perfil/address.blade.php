<!DOCTYPE html>
<html lang="pt-br">
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
  
  <link rel="stylesheet" href="../css/address.css">
  <link rel="stylesheet" href="../css/header.css">
    
</head>
<body>

<header>
    <ul class="nav justify-content-between align-items-center">
      <li class="nav-item"> <a href="/profile" class="voltar-a-loja"> <img src="images/de-volta.png" alt="" width="23px" height="20px"> Minha conta</a></li>
      <li class="nav-item"><img src="images/fox1.svg" alt="" width="116px" height="122px"></li>
      <li class="nav-item"><img src="images/seguro.png" alt="" width="23px" height="20px">Ambiente 100% seguro</li>
    </ul>
  </header>
<hr>

<main>
<div class="welcome-section">
<h1>ENDEREÇO</h1>
</div>

<section> 
<div class="address-save">
<h2 class="address-save-title">ENDEREÇO CADASTRADO</h2>
<div class="progress-bar"></div>

<ul class="adress-list"> 
    @isset($endereco)
        <li class="adreess-item address-send-title">ENDEREÇO DE ENTREGA</li>
        <li class="adreess-item">{{ $endereco->ENDERECO_NOME }}</li>
        <li class="adreess-item">{{ $endereco->ENDERECO_LOGRADOURO }}, {{ $endereco->ENDERECO_NUMERO }}</li>
        <li class="adreess-item">{{ $endereco->ENDERECO_CIDADE }}</li>
        <li class="adreess-item">{{ $endereco->ENDERECO_ESTADO }}</li>
        <li class="adreess-item">{{ substr_replace($endereco->ENDERECO_CEP, '-', 5, 0) }}</li>
        <li class="adreess-item">{{ $endereco->ENDERECO_COMPLEMENTO }}</li>

        <div class="address-button">
        <li><button class="address-action" onclick="showUpdateSection()">Modificar <span> > </span></button></li>

        <li>
        <form action="{{ route('address.remove') }}" method="POST">
          @csrf
          <button type="submit" class="address-action">Remover ></button></form>
        </li>
        </div>

        @else
        <li class="adreess-item">Nenhum endereço cadastrado</li>
        <button id="showAddressForm" class="save-button marginBotao"  >ADICIONAR ENDEREÇO</button>
        @endisset
</ul>
</div>
</section>

<section>
  <div class="new-address" style="display: none;">

  <h2 class="address-add-title">ADICIONAR UM ENDEREÇO</h2>
  <div class="progress-bar"></div>

  <form class="address-form" action="{{ route('address.store') }}" method="POST">
    @csrf
    <input class="address-form-item formName" type="text" placeholder="Nome" name="ENDERECO_NOME" required> 
    <input class="address-form-item formLog" type="text" placeholder="Logradouro" name="ENDERECO_LOGRADOURO" required> 
    <input class="address-form-item formNumber" type="number" placeholder="Número" name="ENDERECO_NUMERO" required> 
    <input class="address-form-item formCity" type="text" placeholder="Cidade" name="ENDERECO_CIDADE" required> 
    <input class="address-form-item formEstate" type="text" placeholder="Estado-UF" name="ENDERECO_ESTADO" maxlength="2" required> 
    <input class="address-form-item formZipCode" type="text" placeholder="CEP" name="ENDERECO_CEP" maxlength="9" required > 
    <input class="address-form-item formComplement" type="text" placeholder="Complemento" name="ENDERECO_COMPLEMENTO"> 
    <button class="save-button">SALVAR ENDEREÇO</button>
    <button class="cancel-button">Cancelar</button>
  </form>
  </div>
</section>

<section id="updateSection" style="display: none;">
  <div class="updateAddress">

  <h2 class="address-add-title">ATUALIZAR ENDEREÇO</h2>
  <div class="progress-bar"></div>

  <form class="address-form" action="{{ isset($endereco) ? route('address.update', $endereco->ENDERECO_ID) : '#' }}" method="POST">
    @csrf
    @isset($endereco)
        @method('PUT')
    @endisset    
    <input class="address-form-item formName" type="text" placeholder="Nome" name="ENDERECO_NOME"
    required value="{{ isset($endereco) ? $endereco->ENDERECO_NOME : '' }}">

<input class="address-form-item formLog" type="text" placeholder="Logradouro" name="ENDERECO_LOGRADOURO"
    required value="{{ isset($endereco) ? $endereco->ENDERECO_LOGRADOURO : '' }}">

<input class="address-form-item formNumber" type="number" placeholder="Número" name="ENDERECO_NUMERO"
    required value="{{ isset($endereco) ? $endereco->ENDERECO_NUMERO : '' }}">

<input class="address-form-item formCity" type="text" placeholder="Cidade" name="ENDERECO_CIDADE"
    required value="{{ isset($endereco) ? $endereco->ENDERECO_CIDADE : '' }}">

<input class="address-form-item formEstate" type="text" placeholder="Estado-UF" name="ENDERECO_ESTADO" maxlength="2"
    required value="{{ isset($endereco) ? $endereco->ENDERECO_ESTADO : '' }}">  

    <input class="address-form-item formZipCode" id="cepUpdate" type="text" placeholder="CEP" name="ENDERECO_CEP" maxlength="9" 
    required value="{{ isset($endereco) ? $endereco->ENDERECO_CEP : '' }}" >

    <input class="address-form-item formComplement" type="text" placeholder="Complemento" name="ENDERECO_COMPLEMENTO" 
    value="{{ isset($endereco) ? $endereco->ENDERECO_COMPLEMENTO : '' }}"> 

    <button class="save-button">SALVAR ALTERAÇÕES</button>
    <button type="button" class="cancel-button" id="cancelUpdate">Cancelar</button>
  </form>
  </div>

</section>
</main>


<footer>

<!--Receba promoções banner-->
<div id="news-and-promotions-banner" class="container-fluid">
  <div class="row h-100 d-flex align-items-center justify-content-center">

    <div class="col col-4 fs-3 text-light fw-semibold">RECEBA PROMOÇÕES E NOVIDADES!</div>

    <div class="col col-4 d-flex justify-content-evenly">
      <input type="email" class="form-control text-us-input" placeholder="Seu nome">
      <input type="email" class="form-control text-us-input" placeholder="E-mail">
      <button type="button" class="btn btn px-4" style="background-color: #F9A80C; color:white;">Enviar</button>
    </div>
  </div>
</div>

<div id="social-midia-footer" class="container-fluid">
  <div class="row d-flex justify-content-center">
    <div class="col col-2 d-flex flex-column footer-column">
      <h3 class="fs-5 text-uppercase">Institucional</h3>
      <a href="{{ route('politicas.sobre-nos') }}" class="link-footer mb-3">Sobre a marca</a>
      <a href="{{ route('politicas.trocas-devolucoes') }}" class="link-footer mb-3">Trocas e Devoluções</a>
      <a href="{{ route('politicas.politica-de-privacidade') }}" class="link-footer mb-3">Políticas de privacidade</a>
    </div>
    <div class="col col-2 d-flex flex-column footer-column">
      <h3 class="fs-5 text-uppercase">Loja</h3>
      <a href="/profile"class="link-footer mb-3">Minha conta</a>
      <a href="/profile"class="link-footer mb-3">Meu Carrinho</a>
      <a href="/profile"class="link-footer mb-3">Meus pedidos</a>
    </div>
    <div class="col col-2 d-flex flex-column footer-column">
      <h3 class="fs-5 text-uppercase">Redes Sociais</h3>
      <div class="d-flex justify-content-start mb-4">
        <img src="{{ asset('images/facebook.png') }}" class="footer-icon-resize me-2" alt="Icone Facebook">
        <a href="https://www.facebook.com/?locale=pt_BR" class="m-0" style="text-decoration:none; color:#000000">@lojafoxbrinquedos</a>
      </div>

      <div class="d-flex justify-content-start">
        <img src="{{ asset('images/instagram.png') }}" class="footer-icon-resize me-2" alt="Icone Instagram">
        <a href="https://www.instagram.com" class="m-0" style="text-decoration:none; color:#000000">@lojafoxbrinquedos</a>
      </div>
    </div>
    <div class="col col-2 footer-column d-flex flex-column align-items-center">
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

  <a href="https://wa.me/+5511944880786" target="_blank"><img src="{{ asset('images/whatsapp.png') }}" alt="Logo WhatsApp" class="object-fit-contain me-3 mb-3 position-fixed bottom-0 end-0" width="58px">
  </a>
</div>

</footer>

  <script src="{{ asset('js/script.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
<script src="/js/address.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>