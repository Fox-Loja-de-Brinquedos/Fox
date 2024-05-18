<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<header>
    <ul class="nav justify-content-between align-items-center">
    <li class="nav-item"><a href="/" class="voltar-a-loja"><img src="images/de-volta.png" alt="" width="23px" height="20px"> Voltar à loja</a></li>
      <li class="nav-item"><img src="images/fox1.svg" alt="" width="116px" height="122px"></li>
      <li class="nav-item"><img src="images/seguro.png" alt="" width="23px" height="20px">Ambiente 100% seguro</li>
    </ul>
  </header>

<main>
    <div class="welcome-section">
      <div class="star-section">
        <span class="welcome-star"><img src="images/star.svg" alt=""></span>
        <span class="welcome-star"><img src="images/star.svg" alt=""></span>
      </div>        
        <h2 class="welcome-msg">Bem-vinde</h2>
        <h1 class="profile-name">{{ Auth::user()->USUARIO_NOME }}</h1>
    </div>

    <div class="orders-section">
    <h2 class="order-title">OS SEUS PRODUTOS</h2>
    <span class="order-icon"><img src="images/sacola.svg" alt=""> Pedidos</span>
    <a href="{{ route('orderList') }}" class="orders">Ainda não foram realizadas encomendas.</a>
    </div>

    <div class="account-section">
    <h2 class="account-title">DETALHES DA CONTA</h2>

    <div class="order-button">
    <a href="{{ route('accountDetails') }}" class="btn-order">Detalhes pessoais <span> > </span> </a>
    <a href="{{ route('address') }}" class="btn-order">Endereços <span> > </span> </a>
    <a href="{{ route('logout') }}" class="logout">Sair</a>
    </div>
    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>