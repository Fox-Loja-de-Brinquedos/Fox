<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
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
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="container-fluid">
                
              <!-- Linha do Frete Grátis -->
              <div class="row justify-content-center">
                <div class="col-12 text-center ps-0 pe-0">
                  <div class="header-top">
                      <p style="margin-bottom: 0;"><strong>Frete grátis</strong> acima de R$ 199,99 em compras!</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="container">
                 
              <!-- Linha do Logo, Barra de Pesquisa e Botões -->
              <div class="row mt-3 mb-3 d-flex justify-content-between" style="position: relative;">
                  <div class="col-1" style="position: absolute; top: -45px">
                  <img src="imgs/logo-fox.png" alt="Logotipo">
                </div>
                  <div class="col-6" style="margin-left: 120px;">
                  <form class="form-inline">
                    <input class="form-control mr-2 searchbar" style="display: inline-block; max-width: 545px;" type="text" placeholder="Qual produto você está buscando?" style="width: 80%;">
                    <button class="btn btn-primary btn-search" type="submit"><i class="fa fa-search"></i></button>
                  </form>
                </div>
                <div class="col-2">
                  <button class="btn text-uppercase fw-bold btn-login"><img src="imgs/icon-account.png" alt=""> Entrar / Cadastrar</button>
                </div>
                <div class="col-2">
                  <button class="btn text-uppercase fw-bold btn-cart"><img src="imgs/icon-cart.png" alt=""> Meu Carrinho</button>
                </div>
              </div>
            </div>

            <div class="divisor"></div>

              <!-- Linha da Navegação -->
            <div class="container">
              <div class="row">
                <div class="col-12 text-center">
                  <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="categories-menu navbar-nav mx-auto">
                        <li class="nav-item custom-nav-item">
                          <a class="nav-link nav-link-uppercase" href="#">Bonecas</a>
                        </li>
                        <li class="nav-item custom-nav-item">
                          <a class="nav-link nav-link-uppercase" href="#">Veículos</a>
                        </li>
                        <li class="nav-item custom-nav-item">
                          <a class="nav-link nav-link-uppercase" href="#">Pelúcias</a>
                        </li>
                        <li class="nav-item custom-nav-item">
                          <a class="nav-link nav-link-uppercase" href="#">Jogos de cartas</a>
                        </li>
                        <li class="nav-item custom-nav-item">
                          <a class="nav-link nav-link-uppercase" href="#">Tabuleiros</a>
                        </li>
                        <li class="nav-item custom-nav-item">
                          <a class="nav-link nav-link-uppercase" href="#">Eletrônicos</a>
                        </li>
                        <li class="nav-item custom-nav-item">
                          <a class="nav-link nav-link-uppercase" href="#">Outros brinquedos</a>
                        </li>
                        <li class="nav-item custom-nav-item">
                          <a class="nav-link nav-link-uppercase lancamentos" href="#">Lançamentos</a>
                        </li>
                        <li class="nav-item custom-nav-item">
                          <a class="nav-link nav-link-uppercase ofertas" href="#">Ofertas</a>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </div>
              </div>
            </div>
        </header>
        
        <main class="container mt-5">
            <div class="row">
                <aside class="col-3">
                    <h3>Filtrar por...</h3>
                </aside>
                <section class="col-9">
                    <h2 class="text-center">Resultado da pesquisa: 36 produtos encontrados</h2>
                </section>
            </div>
        </main>


        
    </body>
</html>
