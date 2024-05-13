<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/address.css">
    <link rel="stylesheet" href="../css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
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
        <li><button class="address-action">Remover <span> > </span></button></li>
        </div>

        @else
        <li class="adreess-item">Endereço não cadastrado</li>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
<script src="/js/address.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>