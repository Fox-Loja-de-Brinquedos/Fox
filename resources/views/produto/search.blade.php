<!DOCTYPE html>
<html lang="pt_BR">

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
                    <button class="btn text-uppercase fw-bold btn-login"><img src="{{ asset('images/icon-account.png') }}" alt=""> Entrar /
                        Cadastrar</button>
                </div>
                <div class="col-2">
                    <button class="btn text-uppercase fw-bold btn-cart"><img src="{{ asset('images/icon-cart.png') }}" alt=""> Meu
                        Carrinho</button>
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



    <!--Container Filtros e Listagem de Produtos-->
    <div class="container-fluid d-flex justify-content-around mt-5">

        <!--Container Filtros-->
        <aside id="filter-container">
            <div>
                <h2 class="fs-5 fw-semibold">Selecione os filtros</h2>

                <div>
                    <!--Filtrar por Categoria-->
                    <p class="fs-5 ms-3 fw-semibold">Categoria</p>
                    <div class="ms-2 overflow-y-scroll" id="category-list">
                        <ul class="list-group">
                            <li class="list-group-item d-flex align-items-center">
                                <input class="form-check-input my-0" type="checkbox">
                                <p class="ms-2 my-0">Bonecas</p>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <input class="form-check-input my-0" type="checkbox">
                                <p class="ms-2 my-0">Rifles de Assalto</p>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <input class="form-check-input my-0" type="checkbox">
                                <p class="ms-2 my-0">Eróticos</p>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <input class="form-check-input my-0" type="checkbox">
                                <p class="ms-2 my-0">Homossexual</p>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <input class="form-check-input my-0" type="checkbox">
                                <p class="ms-2 my-0">Venenoso</p>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <input class="form-check-input my-0" type="checkbox">
                                <p class="ms-2 my-0">Morte</p>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <input class="form-check-input my-0" type="checkbox">
                                <p class="ms-2 my-0">Perigo</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <!--Filtrar por Promoção-->
                <p class="fs-5 ms-3 mt-4 fw-semibold">Promoção</p>
                <div class="ms-2">
                    <ul class="list-group">
                        <li class="list-group-item d-flex align-items-center">
                            <input class="form-check-input my-0" type="checkbox">
                            <p class="ms-2 my-0">Produtos em Promoção</p>
                        </li>
                    </ul>
                </div>

                <!--Filtrar por Preço-->
                <p class="fs-5 ms-3 mt-4 fw-semibold">Faixa de Preço</p>
                <div class="container">
                    <input type="range" class="form-range" id="valueRange">
                </div>

                <!--Limpar Filtros-->
                <p class="fs-5 ms-3 mt-4 fw-semibold">Limpar Filtros</p>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" onclick="resetFilters()" type="button">Limpar</button>
                </div>

            </div>
        </aside>

        <!--Container Resultado da Pesquisa-->
        <div class="container m-0">

            <h1 class="fs-4 text-center my-0">Resultado da Pesquisa: {{ $quantidadeProdutos }} produtos encontrados</h1>

            <div class="d-flex justify-content-end mb-4">
                <div class="dropdown me-5">
                    <button class="dropdown-toggle filter-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ordenar
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mais vendidos</a></li>
                        <li><a class="dropdown-item" href="#">Descontos</a></li>
                        <li><a class="dropdown-item" href="#">Maior preço</a></li>
                        <li><a class="dropdown-item" href="#">Menor preço</a></li>
                    </ul>
                </div>
            </div>

            <div class="container-fluid d-flex justify-content-center">
                <!--Cards Container-->
                <div class="d-flex justify-content-left w-100 row flex-wrap gap-4 ps-4">
                    <!--Card-->
                    @foreach ($produtos as $produto)

                    <!--Calculo para quantidade de parcelas e seus valores-->
                    @php
                    $qtd_parcelas = 1;
                    $produto_preco = $produto->PRODUTO_PRECO;
                    if ($produto_preco >= 999) {
                    $qtd_parcelas = 12;
                    } elseif ($produto_preco >= 799) {
                    $qtd_parcelas = 10;
                    } elseif ($produto_preco >= 599) {
                    $qtd_parcelas = 8;
                    } elseif ($produto_preco >= 399) {
                    $qtd_parcelas = 6;
                    } elseif ($produto_preco >= 199) {
                    $qtd_parcelas = 4;
                    } elseif ($produto_preco >= 99) {
                    $qtd_parcelas = 2;
                    }
                    $valor_parcela = $produto_preco / $qtd_parcelas;
                    @endphp

                    <div class="card product-card" style="width: 18rem;">
                        <div class="d-flex justify-content-center align-items-center" style="height: 50%;">
                            <a href="#">
                                @if ($produto->imagens->isNotEmpty())
                                <img src="{{ $produto->imagens->first()->IMAGEM_URL }}" class="card-img-top card-img-resize" alt="Imagem do produto">
                                @else
                                <img src="https://multilit.com.br/wp-content/uploads/2020/03/Produto-sem-foto.png" class="card-img-top card-img-resize" alt="Imagem padrão">
                                @endif
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="#">
                                <h5 class="card-title">{{ $produto->PRODUTO_NOME }}</h5>
                                <b>
                                    <p class="card-text">R$ {{ $produto->PRODUTO_PRECO }}</p>
                                </b>
                            </a>

                            <p>{{ $qtd_parcelas }}x de R$ {{ number_format($valor_parcela, 2, ',', '.') }} sem juros</p>
                            <a href="#">
                                <div class="py-2 add-to-cart-box">
                                    Adicionar ao Carrinho
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

            <!-- Icones de navegação de págs -->
            <div class="container d-flex justify-content-center mt-5 mb-5">
                <div class="w-25 d-flex justify-content-around align-items-center">
                    <div class="col-auto">
                        <a href="{{ $produtos->previousPageUrl() }}">
                            <svg class="icon-inline mt-1 shaft-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                                <path d="M241,451.75l-18.11,18.1L9.07,256,222.92,42.15,241,60.25,45.28,256Z"></path>
                            </svg>
                        </a>
                    </div>

                    <div>
                        <span>{{ $produtos->currentPage() }}</span>
                        <span>/</span>
                        <span>{{ $produtos->lastPage() }}</span>

                    </div>

                    <div>
                        <a href="{{ $produtos->nextPageUrl() }}">
                            <svg class="icon-inline mt-1 shaft-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                                <path d="M210.72,256,15,60.25l18.11-18.1L246.93,256,33.08,469.85,15,451.75Z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
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

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>