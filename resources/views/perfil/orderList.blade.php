<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/orderList.css">
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
<hr>
  </header>

    <main>
        
    <div class="title-section">
        <h1>LISTA DE PEDIDOS</h1>
    </div>

    <div class="orders-section">
        <div class="order">
            <p class="status-order">EM ANDAMENTO</p>
            <p class="item-order">#00001</p>
            <img class="img-order" src="images/toy.png" alt="miniImg">
            <p class="date-order">Data do pedido: 01/02/2024</p>
            <p class="order-unit">Unidade: 1</p>
            <p class="order-price">R$ 1010,15</p>
            <div class="progress-bar open"> </div>
        </div>

        <div class="order">
            <p class="status-order">FINALIZADO</p>
            <p class="item-order">#00666</p>
            <img class="img-order" src="images/toy.png" alt="miniImg">
            <p class="date-order">Data do pedido: 02/01/2023</p>
            <p class="order-unit">Unidade: 2</p>
            <p class="order-price">R$ 110,15</p>
            <div class="progress-bar close"> </div>
        </div>

        </div>
    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>