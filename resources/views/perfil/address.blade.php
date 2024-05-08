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
<h1>LISTA DE ENDEREÇOS</h1>
</div>

<section> 
<div class="address-save">
<h2 class="address-save-title">ENDEREÇOS CADASTRADOS</h2>
<div class="progress-bar"></div>

<ul class="adress-list"> 
  <li class="adreess-item address-send-title">ENDEREÇO DE ENTREGA</li>
  <li class="adreess-item">casa do matue</li>
  <li class="adreess-item">quando a onda bater, 666</li>
  <li class="adreess-item">Calilandia</li>
  <li class="adreess-item">Bahia</li>
  <li class="adreess-item">04830-020</li>
  <li class="adreess-item">Nordeste</li>
</ul>

<div class="address-button">
<button class="address-action">Modificar <span> > </span></button>
<button class="address-action">Remover <span> > </span></button>
</div>

</div>
</section>

<section>
  <div class="new-address">

  <h2 class="address-add-title">ADICIONAR UM ENDEREÇO</h2>
  <div class="progress-bar"></div>

  <form class="address-form" action="">
    <input class="address-form-item formName" type="text" placeholder="Nome"> 
    <input class="address-form-item formLog" type="text" placeholder="Logradouro"> 
    <input class="address-form-item formNumber" type="text" placeholder="Número"> 
    <input class="address-form-item formCity" type="text" placeholder="Cidade"> 
    <input class="address-form-item formEstate" type="text" placeholder="Estado"> 
    <input class="address-form-item formZipCode" type="text" placeholder="CEP"> 
    <button class="save-button">ADICIONAR ENDEREÇO</button>
    <button class="cancel-button">Cancelar</button>
  </form>
  </div>
</section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>