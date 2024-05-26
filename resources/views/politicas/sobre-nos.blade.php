<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo-fox.png') }}" type="image/x-icon">
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
            <div class="row mt-3 mb-3 d-flex justify-content-between align-items-center" style="position: relative;">
                <div class="col-1" style="position: absolute; top: -45px">
                    <a href="{{ route('produto.index') }}">
                        <img src="{{ asset('images/logo-fox.png') }}" alt="Logotipo">
                    </a>
                </div>
                <div class="col-6" style="margin-left: 120px;">
                    <form class="form-inline" action="{{ route('produto.search') }}" method="GET">
                        <input class="form-control mr-2 searchbar" name="search" style="display: inline-block; max-width: 545px;" type="text" placeholder="Qual produto você está buscando?" style="width: 80%;">
                        <button class="btn btn-primary btn-search" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="col-2">
                    @if( Auth::user())
                    <a href="/profile" class="btn text-uppercase fw-bold btn-login d-flex align-items-center nav-text">
                        <img class="mt-0 me-2 nav-img" src="{{ asset('images/icon-account.png') }}">
                        Olá, {{ Auth::user()->USUARIO_NOME }}
                    </a>
                    @else
                    <a href="/profile" class="btn text-uppercase fw-bold btn-login d-flex align-items-center nav-text">
                        <img class="mt-0 me-2 nav-img" src="{{ asset('images/icon-account.png') }}">
                        Entrar /
                        Cadastrar
                    </a>
                    @endif

                </div>
                <div class="col-2">
                    <a href="{{ route('pedidos.index') }}" class="btn text-uppercase fw-bold btn-cart d-flex align-items-center nav-text">
                        <img class="mt-0 me-2 nav-img" src="{{ asset('images/icon-cart.png') }}">
                        Meu Carrinho
                    </a>
                </div>
            </div>
        </div>
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

    <!--inicio do texto-->

    <div class="container-fluid py-3 mt-3 mb-3" style="background-color: #43ADDA; color: white;">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1>SOBRE A MARCA</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <p class="mt-5 mb-4">
                    Bem-vindo à nossa loja de brinquedos infantis, fundada em 20 de Fevereiro de 2024 por um grupo de amigos apaixonados por trazer alegria e diversão para crianças de todas as idades. Nossa equipe é composta por três homens e uma mulher, cada um com uma visão única e um desejo compartilhado de criar um ambiente mágico onde a imaginação e a criatividade podem florescer.
                    Nós acreditamos que brincar é uma parte essencial do desenvolvimento infantil, e estamos dedicados a oferecer uma seleção diversificada de brinquedos que não só entretêm, mas também educam. Desde jogos educativos até brinquedos clássicos que nunca saem de moda, nossa loja tem algo especial para cada criança.
                </p>
                <h3 class="mt-5 mb-4">Nossa História</h3>
                <p>
                    Nossa loja começou como um sonho de quatro amigos tentando teminar logo um trabalho: Tafinha, Ricardinho, Namorido e Okka. Com uma paixão comum por brinquedos e um desejo de fazer a diferença na vida das crianças, eles uniram suas experiências e habilidades para criar um espaço especial dedicado ao mundo infantil.
                    Desde o início humilde, como um pequeno projeto de faculdade, nossa dedicação e compromisso com a excelência nos ajudaram a crescer e a nos tornarmos o site favorito para famílias em busca de brinquedos de qualidade.
                </p>
                <h3 class="mt-5 mb-4">Nossos Valores</h3>
                <p>Qualidade: Selecionamos cuidadosamente cada brinquedo para garantir que ele atenda aos mais altos padrões de segurança e durabilidade.</p>
                <p>Diversidade: Nossa coleção inclui brinquedos para todas as idades e interesses, promovendo a inclusão e a aceitação de todas as crianças.</p>
                <p>Inovação: Estamos sempre em busca dos brinquedos mais inovadores que estimulam a criatividade e a imaginação.</p>
                <p>Sustentabilidade: Comprometemo-nos a oferecer opções ecologicamente responsáveis, ajudando a proteger o planeta para as futuras gerações</p>
                <h3 class="mt-5 mb-4">Nossa Missão</h3>
                <p>
                    Nossa missão é proporcionar momentos inesquecíveis de felicidade e aprendizado para as crianças e suas famílias. Queremos ser mais do que apenas uma loja de brinquedos; aspiramos a ser um lugar de compras onde os sonhos ganham vida e onde cada visita uma nova seja uma nova compra .
                </p>
            </div>
        </div>
    </div>


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
                    <a href="{{ route('politicas.sobre-nos') }}" class="link-footer mb-3" style="text-decoration: none; color:black">Sobre a marca</a>
                    <a href="{{ route('politicas.trocas-devolucoes') }}" class="link-footer mb-3" style="text-decoration: none; color:black">Trocas e Devoluções</a>
                    <a href="{{ route('politicas.politica-de-privacidade') }}" class="link-footer mb-3" style="text-decoration: none; color:black">Políticas de privacidade</a>
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


    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>