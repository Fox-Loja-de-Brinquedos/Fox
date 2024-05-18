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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
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
                        <input class="form-control mr-2 searchbar" style="display: inline-block; max-width: 545px;"
                            type="text" placeholder="Qual produto você está buscando?" style="width: 80%;">
                        <button class="btn btn-primary btn-search" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="col-2">
                    <button class="btn text-uppercase fw-bold btn-login"><img src="imgs/icon-account.png" alt=""> Entrar
                        / Cadastrar</button>
                </div>
                <div class="col-2">
                    <button class="btn text-uppercase fw-bold btn-cart"><img src="imgs/icon-cart.png" alt=""> Meu
                        Carrinho</button>
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

    <main class="container">

        <div class="container single-product">
            <div class="card-1"></div>
            <div class="card-2">
                <img  style="border: 2px solid #ddd;" src="imgs\stich.jpg" alt="stich-pelucia" id="main-image">
                <div class="product-images">
                    <div class="thumbnail-carousel">
                        <img style="border: 2px solid #ddd;"src="imgs\stich.jpg" alt="Thumbnail 1" class="thumbnail">
                        <img style="border: 2px solid #ddd;" src="imgs\stich_2.png" alt="Thumbnail 2" class="thumbnail">
                        <img style="border: 2px solid #ddd;" src="imgs\stich.jpg" alt="Thumbnail 3" class="thumbnail">
                    </div>
                </div>
            </div>

            <div class="view-information ms-5">
                <h2 class="fs-1 text-left text-purple" style="color:purple;">Pelúcia Stitch</h2>
                <p class="p-1 fs-5 mb-1 " style="color:purple;">POR: <span class="span-1 fs-3">R$119,99</span></p>
                <p class="p-2 fs-5 mb-1" >ou R$ 113,99</p>
                <p class="p-2 fs-5 mb-1">ou 5% off no boleto <span class="span-3 fs-5 text-success">(R$ 113,99)</span>
                </p>
                <div class="quantity">
                    <button class="minus-btn btn btn-primary btn-sm">-</button>
                    <input type="text" value="1" readonly>
                    <button class="plus-btn btn btn-primary btn-sm">+</button>
                </div>
                <div class="button mt-5">
                    <button type="button" class="btn btn-outline btn-lg" style="border-color: orange; color: orange;">Adicionar ao carrinho</button>
                </div>
            </div>
        </div>

        <div class="card-4 w-100 d-flex flex-column align-items-center">
            <h2 class="fs-1 mb-3 text-info">Descrição</h2>
            <p class="f-5 d-flex w-50 mb-5 ">A linda Bella, ama grandes abraços e seus longos braços são perfeitos para isso!
                Os
                Fingerlings Hugs são amáveis, divertidos e carinhosos e nunca querem deixar você ir! Essa incrível
                pelúcia
                reage ao toque, tem mais de 40 interações, como: mandar beijos e repetir o que você fala. piscar de
                olhos,
                entre outros. A brincadeira vai ficar muito mais fofa e animada com Fingerlings Hugs!</p>
        </div>


        <script>
            var MainImg = document.getElementById("main-image");
            var smallimg = document.getElementsByClassName("thumbnail");
            smallimg[0].onclick = function () {
                MainImg.src = smallimg[0].src;
            }
            smallimg[1].onclick = function () {
                MainImg.src = smallimg[1].src;
            }
            smallimg[2].onclick = function () {
                MainImg.src = smallimg[2].src;
            }
        </script>

        <script src="script.js"></script>

    </main>

    <footer>

        <!--Receba promoções banner-->
        <div id="news-and-promotions-banner" class="container-fluid">
            <div class="row h-100 d-flex justify-content-center align-items-center">
                <div class="col col-4 fs-3 text-light fw-semibold">RECEBA PROMOÇÕES E NOVIDADES!</div>

                <div class="col col-4 d-flex justify-content-evenly">
                    <input type="email" class="form-control text-us-input" placeholder="Seu nome">
                    <input type="email" class="form-control text-us-input" placeholder="E-mail">
                    <button type="button" class="btn btn-dark px-4">Enviar</button>
                </div>
            </div>
        </div>

        <div id="social-midia-footer" class="container-fluid">
            <div class="row h-100 d-flex justify-content-center">
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
                        <img src="imgs/facebook.png" class="footer-icon-resize me-2" alt="Icone Facebook">
                        <p class="m-0">@lojafoxbrinquedos</p>
                    </div>

                    <div class="d-flex justify-content-start">
                        <img src="imgs/instagram.png" class="footer-icon-resize me-2" alt="Icone Instagram">
                        <p class="m-0">@lojafoxbrinquedos</p>
                    </div>
                </div>
                <div class="col col-2 footer-column">
                    <h3 class="fs-5 text-uppercase">Formas de pagamento</h3>
                    <img src="imgs/cartao-footer.png" alt="Cartões aceitos na loja">
                </div>
            </div>
        </div>

        <div class="divisor"></div>

        <div id="copyright-footer" class="container-fluid d-flex mb-3 mt-3 justify-content-between align-items-center">
            <img src="imgs/fox.png" alt="Logo Fox" class="copyright-footer-icons-resize ms-3">

            <i>
                <p>Fox Store © 2024 - Todos os direitos reservados</p>
            </i>

            <!--Div de suporte WhatsApp fixo-->
            <div class="copyright-footer-icons-resize"></div>
            <a href="#"><img src="imgs/zap.jfif" alt="Logo WhatsApp"
                    class="copyright-footer-icons-resize me-3 mb-3 position-fixed bottom-0 end-0">
            </a>
        </div>

    </footer>

</body>

</html>