<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/accountDetails.css">
    <link rel="stylesheet" href="../css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<header>
    <ul class="nav justify-content-between align-items-center">
      <li class="nav-item"><img src="images/de-volta.png" alt="" width="23px" height="20px"> Minha conta</li>
      <li class="nav-item"><img src="images/fox1.svg" alt="" width="116px" height="122px"></li>
      <li class="nav-item"><img src="images/seguro.png" alt="" width="23px" height="20px">Ambiente 100% seguro</li>
    </ul>
  </header>
<hr>

<main>
<div class="title-section">
  <h1 class="title-details">DETALHES PESSOAIS</h1>
</div>  

<section class="profile-pref">
<h2 class="title-detail">PERFIL</h2>

<form class="formProfile profileForm" action="">
  <label for="name" class="name-label">Nome</label>
  <input  type="text" placeholder="Lineuzinho"  id="name">
  <button class="btn-detail">ATUALIZAR PERFIL</button>
</form>
</section>

<section class="profile-contact">
<h2 class="title-detail">CONTATO</h2>

<div class="profile-email">
<label>E-mail</label>
<p>lineuzinho@hotmail.com</p>
</div>


<form class="formProfile " action="">
  <input type="text" placeholder="Novo E-mail">
  <input type="password" placeholder="Senha Atual" >
  <button class="btn-detail">ATUALIZAR ENDEREÇO DE E-MAIl</button>
</form>
</section>

<section class="profile-password">
<h2 class="title-detail">SENHA</h2>
<p class="passWarning">Todos os campos são obrigatórios</p>

<form class="formProfile" action="">
  <input type="password" placeholder="Senha Atual">
  <input type="password" placeholder="Nova Senha">
  <button class="btn-detail">ALTERAR SENHA</button>
</form>
</section>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>