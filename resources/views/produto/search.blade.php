<!DOCTYPE html>
<html>

<head>
    <title>Fox Store {{ trim($search === '%' ? '' : '- ' . $search) }}</title>
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

    <!-- importando jquery para ajax -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
            <div class="row mt-3 mb-3 d-flex justify-content-between align-items-center position-relative">

                <!-- Logotipo -->
                <div class="col-6 col-md-1 col-lg-1">
                    <a href="{{ route('produto.index') }}" class="header-logo">
                        <img src="{{ asset('images/logo-fox.png') }}" alt="Logotipo">
                    </a>
                </div>

                <!-- Barra de pesquisa -->
                <div class="col-4 col-xxl-6 d-none d-lg-block">
                    <form class="form-inline " action="{{ route('produto.search') }}" method="GET">
                        <input class="form-control mr-2 searchbar" name="search" style="display: inline-block; max-width: 545px;" type="text" autocomplete="off" placeholder="Qual produto você está buscando?" style="width: 80%;" value="{{ $search === "%" ? '' : $search }}">
                        <button class="btn btn-primary btn-search" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Botão minha conta -->
                <div class="col-2 col-md-5 col-lg-3 col-xxl-2 text-end px-0 px-md-1">
                    @if( Auth::user())
                    <div class="dropdown">
                        <a class="btn p-0 p-md-1 dropdown-toggle text-uppercase fw-bold btn-login d-flex align-items-center nav-text justify-content-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="mt-0 me-2 nav-img" src="{{ asset('images/icon-account.png') }}">
                            <span class="d-none d-md-inline-block">
                                Olá, {{ Auth::user()->USUARIO_NOME }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Minha conta</a></li>
                            <li><a class="dropdown-item" href="{{ route('orderList') }}">Meus pedidos</a></li>
                            <li><a class="dropdown-item" href="{{ route('accountDetails') }}">Editar dados pessoais</a></li>
                            <li><a class="dropdown-item" href="{{ route('address') }}">Editar endereço</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
                        </ul>
                    </div>
                    @else
                    <a href="/profile" class="btn p-0 p-md-1 text-uppercase fw-bold btn-login d-flex align-items-center nav-text justify-content-end">
                        <img class="mt-0 me-2 nav-img" src="{{ asset('images/icon-account.png') }}">
                        <span class="d-none d-md-inline-block">
                            Entrar /
                            Cadastrar
                        </span>
                    </a>
                    @endif
                </div>

                <!-- Botão carrinho -->
                <div class="col-2 col-md-4 col-lg-3 col-xxl-2">
                    <a href="/carrinho" class="btn text-uppercase fw-bold btn-cart d-flex align-items-center nav-text justify-content-end">
                        <div class="d-inline-block position-relative">
                            <img class="mt-0 me-2 nav-img" src="{{ asset('images/icon-cart.png') }}">
                            <p id="qty-products-cart">
                                {{ $qtdItensCarinho }}
                            </p>
                        </div>
                        <span class="ps-3 d-none d-md-inline-block">
                            Meu Carrinho
                        </span>
                    </a>
                </div>

                <!-- Navbar para mobile -->
                <div class="col-2 d-lg-none">
                    <nav class="navbar">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu de categorias</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('produto.search' , ['categoriaNome' => '%Bonecas%']) }}">Bonecas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('produto.search' , ['categoriaNome' => '%Carrinhos de madeira%']) }}">Veículos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('produto.search' , ['categoriaNome' => '%Pelúcia%']) }}">Pelúcias</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('produto.search' , ['categoriaNome' => '%Jogos de cartas%']) }}">Jogos de cartas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('produto.search' , ['categoriaNome' => '%Tabuleiro%']) }}">Tabuleiros</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('produto.search' , ['categoriaNome' => '%Eletrônico%']) }}">Eletrônicos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('produto.search')}}">Outros brinquedos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('produto.search' , ['produtoLancamentos' => true]) }}">Lançamentos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('produto.search' , ['promotion_checkbox' => true]) }}">Ofertas</a>
                                    </li>
                                </ul>

                                <form class="form-inline " action="{{ route('produto.search') }}" method="GET">
                                    <input class="form-control mr-2 searchbar d-inline-block mt-3" name="search" type="text" placeholder="Pesquisar produto...">
                                    <button class="btn btn-primary btn-search" type="submit"><i class="fa fa-search"></i></button>
                                </form>

                            </div>
                        </div>
                    </nav>
                </div>
            </div>

        </div>

        <!-- Linha da Navegação -->
        <div class="container d-none d-lg-block">
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="categories-menu navbar-nav mx-auto">
                                <li class="nav-item custom-nav-item">
                                    <a href="{{ route('produto.search' , ['categoriaNome' => '%Bonecas%']) }}" class="nav-link nav-link-uppercase">Bonecas</a>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <a href="{{ route('produto.search' , ['categoriaNome' => '%Carrinhos de madeira%']) }}" class="nav-link nav-link-uppercase">Veículos</a>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <a href="{{ route('produto.search' , ['categoriaNome' => '%Pelúcia%']) }}" class="nav-link nav-link-uppercase">Pelúcias</a>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <a href="{{ route('produto.search' , ['categoriaNome' => '%Jogos de cartas%']) }}" class="nav-link nav-link-uppercase">Jogos de cartas</a>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <a href="{{ route('produto.search' , ['categoriaNome' => '%Tabuleiro%']) }}" class="nav-link nav-link-uppercase">Tabuleiros</a>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <a href="{{ route('produto.search' , ['categoriaNome' => '%Eletrônico%']) }}" class="nav-link nav-link-uppercase">Eletrônicos</a>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <a href="{{ route('produto.search') }}" class="nav-link nav-link-uppercase">Outros brinquedos</a>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <a href="{{ route('produto.search' , ['produtoLancamentos' => true]) }}" class="nav-link nav-link-uppercase lancamentos">Lançamentos</a>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <a href="{{ route('produto.search' , ['promotion_checkbox' => true]) }}" class="nav-link nav-link-uppercase ofertas">Ofertas</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!--Container Filtros e Listagem de Produtos-->
    <div class="container-fluid d-flex justify-content-around mt-5 user-select-none">

        <!--Container Filtros-->
        <aside id="filter-container" class="d-none d-xl-block">
            <div>
                <h2 class="fs-5 fw-semibold">Selecione os filtros</h2>
                <!--Filtrar por Categoria-->
                <div>
                    <p class="fs-5 ms-3 fw-semibold">Categoria</p>
                    <div class="ms-2 overflow-y-scroll" id="category-list">
                        <div class="list-group">
                            <!-- Define o último estado de categoria, filtro e checkbox -->
                            @php
                            $selectedCategoryId = $categoria_id;
                            $dropdownFilter = request('dropdownFilter');
                            $promotionCheckbox = request('promotion_checkbox') ? 'true' : null;
                            @endphp
                            <!--Limpar filtro de categoria-->
                            <a href="{{ route('produto.search', ['categoria_id' => null, 'dropdownFilter' => $dropdownFilter, 'search' => $search, 'minValue' => request()->input('minValue'), 'maxValue' => request()->input('maxValue'), 'promotion_checkbox' => $promotionCheckbox]) }}" class="list-group-item list-group-item-action {{ is_null($selectedCategoryId) ? 'active' : '' }}">
                                - Sem Filtro -
                            </a>
                            @foreach ($categorias as $categoria)
                            @php
                            // Verifica o ID passado na URL e muda a classe do link correspondente
                            $activeClass = ($selectedCategoryId == $categoria->CATEGORIA_ID) ? 'active' : '';
                            // Adiciona o parâmetro 'promotion_checkbox' na URL se a caixa de seleção estiver marcada
                            $queryParams = ['categoria_id' => $categoria->CATEGORIA_ID, 'dropdownFilter' => $dropdownFilter, 'search' => $search, 'minValue' => request()->input('minValue'), 'maxValue' => request()->input('maxValue'), 'promotion_checkbox' => $promotionCheckbox];
                            @endphp
                            <a href="{{ route('produto.search', $queryParams) }}" class="list-group-item list-group-item-action {{ $activeClass }}">
                                {{ $categoria->CATEGORIA_NOME }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>



                <!--Filtrar por Promoção-->
                <p class="fs-5 ms-3 mt-4 fw-semibold">Promoção</p>
                <div class="ms-2">
                    <ul class="list-group" id="promotion-checkbox-container">
                        <li class="list-group-item d-flex align-items-center">
                            <form id="promotion-form" action="{{ route('produto.search' , ['categoria_id' => $categoria->CATEGORIA_ID, 'search' => $search, 'dropdownFilter' => $dropdownFilter]) }}" method="GET">
                                <input id="promotion-checkbox" name="promotion_checkbox" class="form-check-input my-0" type="checkbox">
                                <label for="promotion-checkbox" class="ms-2 my-0 user-select-none">Produtos em Promoção</label>
                            </form>
                        </li>
                    </ul>
                </div>

                <!--Filtrar por Preço-->
                <div id="price-filter-container-desktop">
                    <div id="price-filter">
                        <p class="fs-5 ms-3 mt-4 fw-semibold">Faixa de Preço</p>
                        <div class="container">

                            <form id="price-filter-form" action="{{ route('produto.search') }}" method="GET">
                                <div class="price-input">
                                    <div class="field">
                                        <label for="min-price">Min</label>
                                        <input type="number" id="min-price" name="minValue" value="0" disabled class="min-input m-0 ms-2" />
                                    </div>
                                    <div class="field">
                                        <label for="max-price">Max</label>
                                        <input type="number" id="max-price" name="maxValue" value="{{ round($maxValue) }}" disabled class="max-input m-0 ms-2" />
                                    </div>
                                </div>

                                <div class="slider">
                                    <div class="progress"></div>
                                </div>

                                <div class="range-input">
                                    <input type="range" min="0" max="999" value="0" class="min-range" />
                                    <input type="range" min="1" max="{{ round($maxValue) }}" value="{{ round($maxValue) }}" class="max-range" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--Limpar Filtros-->
                <p class="fs-5 ms-3 mt-4 fw-semibold">Limpar Filtros</p>
                <div class="d-grid gap-2">
                    <a id="limpar-filtros-btn" class="btn btn-primary" href="{{ route('produto.search', ['search' => $search]) }}">Limpar</a>
                </div>

            </div>
        </aside>

        <!--Container Resultado da Pesquisa-->
        <div class="container m-0">

            <h1 class="fs-4 text-center my-0">Resultado da Pesquisa: {{ $qtdProdutos }} produtos encontrados</h1>

            <div class="d-flex justify-content-between mb-4 mt-4 mt-xl-0">

                <div class="filter-button-container">
                    <nav class="navbar d-xl-none">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFiltros" aria-controls="offcanvasFiltros" aria-label="Toggle navigation">
                            <span class="font-weight-bold">Filtros</span>
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasFiltros" aria-labelledby="offcanvasFiltrosLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasFiltrosLabel">Selecione os filtros</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">

                                <div>
                                    <!--Filtrar por Categoria-->
                                    <div>
                                        <p class="fs-5 ms-3 fw-semibold">Categoria</p>
                                        <div class="ms-2 overflow-y-scroll" id="category-list-mobile">
                                            <div class="list-group">
                                                <!-- Define o último estado de categoria, filtro e checkbox -->
                                                @php
                                                $selectedCategoryId = $categoria_id;
                                                $dropdownFilter = request('dropdownFilter');
                                                $promotionCheckbox = request('promotion_checkbox') ? 'true' : null;
                                                @endphp
                                                <!--Limpar filtro de categoria-->
                                                <a href="{{ route('produto.search', ['categoria_id' => null, 'dropdownFilter' => $dropdownFilter, 'search' => $search, 'minValue' => request()->input('minValue'), 'maxValue' => request()->input('maxValue'), 'promotion_checkbox' => $promotionCheckbox]) }}" class="list-group-item list-group-item-action {{ is_null($selectedCategoryId) ? 'active' : '' }}">
                                                    - Sem Filtro -
                                                </a>
                                                @foreach ($categorias as $categoria)
                                                @php
                                                // Verifica o ID passado na URL e muda a classe do link correspondente
                                                $activeClass = ($selectedCategoryId == $categoria->CATEGORIA_ID) ? 'active' : '';
                                                // Adiciona o parâmetro 'promotion_checkbox' na URL se a caixa de seleção estiver marcada
                                                $queryParams = ['categoria_id' => $categoria->CATEGORIA_ID, 'dropdownFilter' => $dropdownFilter, 'search' => $search, 'minValue' => request()->input('minValue'), 'maxValue' => request()->input('maxValue'), 'promotion_checkbox' => $promotionCheckbox];
                                                @endphp
                                                <a href="{{ route('produto.search', $queryParams) }}" class="list-group-item list-group-item-action {{ $activeClass }}">
                                                    {{ $categoria->CATEGORIA_NOME }}
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>



                                    <!--Filtrar por Promoção-->
                                    <p class="fs-5 ms-3 mt-4 fw-semibold">Promoção</p>
                                    <div class="ms-2">
                                        <ul class="list-group" id="promotion-checkbox-container-mobile">
                                            <li class="list-group-item d-flex align-items-center">
                                                <form id="promotion-form-mobile" action="{{ route('produto.search' , ['categoria_id' => $categoria->CATEGORIA_ID, 'search' => $search, 'dropdownFilter' => $dropdownFilter]) }}" method="GET">
                                                    <input id="promotion-checkbox-mobile" name="promotion_checkbox-mobile" class="form-check-input my-0" type="checkbox">
                                                    <label for="promotion-checkbox-mobile" class="ms-2 my-0 user-select-none">Produtos em Promoção</label>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>


                                    <!--Filtrar por Preço-->
                                    <div id="price-filter-container-mobile"></div>

                                    <!--Limpar Filtros-->
                                    <p class="fs-5 ms-3 mt-4 fw-semibold">Limpar Filtros</p>
                                    <div class="d-grid gap-2">
                                        <a id="limpar-filtros-mobile-btn" class="btn btn-primary" href="{{ route('produto.search', ['search' => $search]) }}">Limpar</a>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </nav>
                </div>

                <div class="dropdown me-5">
                    <button class="dropdown-toggle filter-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ordenar
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{ request()->input('dropdownFilter') === null ? 'active' : '' }}" href="{{ route('produto.search', ['categoria_id' => $selectedCategoryId, 'search' => $search, 'minValue' => request()->input('minValue'), 'maxValue' => request()->input('maxValue'), 'promotion_checkbox' => $promotionCheckbox]) }}">- Sem Filtro -</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->input('dropdownFilter') === 'lancamentos' ? 'active' : '' }}" href="{{ route('produto.search', ['dropdownFilter' => 'lancamentos', 'categoria_id' => $selectedCategoryId, 'search' => $search, 'minValue' => request()->input('minValue'), 'maxValue' => request()->input('maxValue'), 'promotion_checkbox' => $promotionCheckbox]) }}">Mais recentes</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->input('dropdownFilter') === 'maisVendidos' ? 'active' : '' }}" href="{{ route('produto.search', ['dropdownFilter' => 'maisVendidos', 'categoria_id' => $selectedCategoryId, 'search' => $search, 'minValue' => request()->input('minValue'), 'maxValue' => request()->input('maxValue'), 'promotion_checkbox' => $promotionCheckbox]) }}">Mais vendidos</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->input('dropdownFilter') === 'descontos' ? 'active' : '' }}" href="{{ route('produto.search', ['dropdownFilter' => 'descontos', 'categoria_id' => $selectedCategoryId, 'search' => $search, 'minValue' => request()->input('minValue'), 'maxValue' => request()->input('maxValue'), 'promotion_checkbox' => $promotionCheckbox]) }}">Descontos</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->input('dropdownFilter') === 'maiorPreco' ? 'active' : '' }}" href="{{ route('produto.search', ['dropdownFilter' => 'maiorPreco', 'categoria_id' => $selectedCategoryId, 'search' => $search, 'minValue' => request()->input('minValue'), 'maxValue' => request()->input('maxValue'), 'promotion_checkbox' => $promotionCheckbox]) }}">Maior preço</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->input('dropdownFilter') === 'menorPreco' ? 'active' : '' }}" href="{{ route('produto.search', ['dropdownFilter' => 'menorPreco', 'categoria_id' => $selectedCategoryId, 'search' => $search, 'minValue' => request()->input('minValue'), 'maxValue' => request()->input('maxValue'), 'promotion_checkbox' => $promotionCheckbox]) }}">Menor preço</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->input('dropdownFilter') === 'aZ' ? 'active' : '' }}" href="{{ route('produto.search', ['dropdownFilter' => 'aZ', 'categoria_id' => $selectedCategoryId, 'search' => $search, 'minValue' => request()->input('minValue'), 'maxValue' => request()->input('maxValue'), 'promotion_checkbox' => $promotionCheckbox]) }}">De A a Z</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->input('dropdownFilter') === 'zA' ? 'active' : '' }}" href="{{ route('produto.search', ['dropdownFilter' => 'zA', 'categoria_id' => $selectedCategoryId, 'search' => $search, 'minValue' => request()->input('minValue'), 'maxValue' => request()->input('maxValue'), 'promotion_checkbox' => $promotionCheckbox]) }}">De Z a A</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!--Container dos produtos e mensagem de produto não encontrado-->
            <div class="container-fluid d-flex justify-content-center">
                @if($qtdProdutos > 0)
                <!--Cards Container-->
                <div class="d-flex justify-content-left w-100 row flex-wrap gap-4 ps-xl-4">
                    <!--Card-->
                    @foreach ($produtos as $produto)

                    <!--Calculo para quantidade de parcelas e seus valores-->
                    @php
                    $qtd_parcelas = 1;
                    $produto_preco = $produto->PRODUTO_PRECO;
                    $produto_desconto = $produto->PRODUTO_DESCONTO;

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
                    $valor_parcela = ($produto_preco - $produto_desconto) / $qtd_parcelas;
                    @endphp

                    <!--Card do Produto-->
                    <div class="card product-card product-card-catalog">
                        <div style="height: 50%;">
                            @if (isset($produto->estoque->PRODUTO_QTD) && $produto->estoque->PRODUTO_QTD === 0)
                            <span class="d-flex justify-content-center align-items-center mt-5">
                                <img src="https://down-br.img.susercontent.com/file/sg-11134201-22100-pj2ikqitawiv83" class="card-img-top card-img-resize" alt="Imagem do produto">
                            </span>
                            @elseif ($produto->imagens->isNotEmpty())
                            <a class="d-flex justify-content-center align-items-center mt-5" href="{{ route('produto.show', [$produto->PRODUTO_ID])}}">
                                <img src="{{ $produto->imagens->first()->IMAGEM_URL }}" class="card-img-top card-img-resize" alt="Imagem padrão">
                            </a>
                            @else
                            <a class="d-flex justify-content-center align-items-center mt-5" href="{{ route('produto.show', [$produto->PRODUTO_ID])}}">
                                <img src="https://multilit.com.br/wp-content/uploads/2020/03/Produto-sem-foto.png" class="card-img-top card-img-resize" alt="Imagem padrão">
                            </a>
                            @endif
                        </div>
                        <div class="card-body text-center">
                            @if (isset($produto->estoque->PRODUTO_QTD) && $produto->estoque->PRODUTO_QTD === 0)
                            <h5 class="card-title">{{ $produto->PRODUTO_NOME }}</h5>
                            <b>
                                <p class="card-text">R$ {{ number_format(($produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO), 2, ',', '.') }}</p>
                            </b>
                            <p>{{ $qtd_parcelas }}x de R$ {{ number_format($valor_parcela, 2, ',', '.') }} sem juros</p>
                            <button class="py-2 add-to-cart-box-out-of-stock" type="submit">
                                Sem estoque
                            </button>
                            @else
                            <a href="{{ route('produto.show', [$produto->PRODUTO_ID])}}">
                                <h5 class="card-title">{{ $produto->PRODUTO_NOME }}</h5>
                                <b>
                                    <p class="card-text">R$ {{ number_format(($produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO), 2, ',', '.') }}</p>
                                </b>
                            </a>
                            <p>{{ $qtd_parcelas }}x de R$ {{ number_format($valor_parcela, 2, ',', '.') }} sem juros</p>
                            <!-- Formulário para adicionar ao carrinho -->
                            <form action="{{ route('carrinho.adicionar') }}" method="POST" class="adicionarItemForm">
                                @csrf
                                <input type="hidden" name="PRODUTO_ID" value="{{ $produto->PRODUTO_ID }}">
                                <input type="hidden" name="ITEM_QTD" value="1">
                                <button class="py-2 add-to-cart-box" type="submit">
                                    Adicionar ao Carrinho
                                </button>
                            </form>
                            @endif
                        </div>

                        <!--Icone de desconto do Produto-->
                        @if($produto->PRODUTO_DESCONTO > 0 && $produto->estoque->PRODUTO_QTD > 0)
                        @php
                        $porcentagem = (1 - ($produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO) / $produto->PRODUTO_PRECO) * 100
                        @endphp

                        <div id="discount-container">
                            <img src="{{ asset('images/discount.png') }}" alt="Icone de Desconto">
                            <p id="discount-icon-text">{{ number_format($porcentagem, 0) }}%</p>
                        </div>
                        @endif

                    </div>
                    @endforeach
                </div>

                @else
                <!--Resposta caso não seja encontrado nenhum produto-->
                <div class="mt-5">
                    <div>
                        <h3 class="fs-2" style="color: #43ADDA;">Ops, não achamos a sua busca...</h3>
                    </div>

                    <div class="fs-5">
                        <p>
                            Não se preocupe! Para melhorar os resultados você pode:
                        </p>
                        <div>
                            <ul>
                                <li>Verificar os termos digitados.</li>
                                <li>Tentar utilizar uma única palavra.</li>
                                <li>Utilizar termos genéricos na busca.</li>
                                <li>Procurar utilizar sinônimos ao termo desejado.</li>
                                <li>Revisar os filtros.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

            </div>

            @if($qtdProdutos !== 0)
            <!-- Icones de navegação de págs -->
            <div class="container d-flex justify-content-center mt-5 mb-5">
                <div class="w-25 d-flex justify-content-around align-items-center">
                    <div class="col-auto">
                        @if ($produtos->onFirstPage())
                        <!-- Desativar o link quando estiver na primeira página -->
                        <span class="disabled">
                            <svg class="icon-inline mt-1 shaft-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                                <path d="M241,451.75l-18.11,18.1L9.07,256,222.92,42.15,241,60.25,45.28,256Z"></path>
                            </svg>
                        </span>
                        @else
                        <!-- Link para a página anterior -->
                        <a href="{{ $produtos->previousPageUrl() }}">
                            <svg class="icon-inline mt-1 shaft-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                                <path d="M241,451.75l-18.11,18.1L9.07,256,222.92,42.15,241,60.25,45.28,256Z"></path>
                            </svg>
                        </a>
                        @endif
                    </div>

                    <div>
                        <span>{{ $produtos->currentPage() }}</span>
                        <span>/</span>
                        <span>{{ $produtos->lastPage() }}</span>
                    </div>

                    <div>
                        @if ($produtos->hasMorePages())
                        <!-- Link para a próxima página -->
                        <a href="{{ $produtos->nextPageUrl() }}">
                            <svg class="icon-inline mt-1 shaft-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                                <path d="M210.72,256,15,60.25l18.11-18.1L246.93,256,33.08,469.85,15,451.75Z"></path>
                            </svg>
                        </a>
                        @else
                        <!-- Desativar o link quando estiver na última página -->
                        <span class="disabled">
                            <svg class="icon-inline mt-1 shaft-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                                <path d="M210.72,256,15,60.25l18.11-18.1L246.93,256,33.08,469.85,15,451.75Z"></path>
                            </svg>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>


    <footer>

        <!--Receba promoções banner-->
        <div id="news-and-promotions-banner" class="container-fluid">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-12 col-xl-6 fs-3 text-light fw-semibold mb-3 mb-xl-0">
                        <h2 class="newsletter-banner-title">
                            RECEBA PROMOÇÕES E NOVIDADES!
                        </h2>
                    </div>

                    <div class="col-12 col-xl-6 d-flex justify-content-evenly">
                        <div class="container">
                            <form id="newsletter">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-4 mb-2 mb-sm-0">
                                        <input type="text" class="form-control text-us-input w-100" required placeholder="Seu nome">
                                    </div>
                                    <div class="col-12 col-sm-4 mb-2 mb-sm-0">
                                        <input type="email" class="form-control text-us-input w-100" required placeholder="E-mail">
                                    </div>
                                    <div class="col-12 col-sm-3 mb-2 mb-sm-0">
                                        <button type="submit" class="btn btn px-4 w-100" style="background-color: #F9A80C; color:white;">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Mensagem de Sucesso ao enviar formulário-->
        <div class="mensagem">
            <p class="p-5">Formulário enviado com sucesso!</p>
        </div>

        <div id="social-midia-footer" class="container mt-5 mb-2 mb-lg-5">
            <div class="row px-3 px-sm-0">
                <div class="col-12 col-sm-6 mb-4 mb-lg-0 col-lg-3 d-flex flex-column footer-column">
                    <h3 class="fs-5 text-uppercase">Institucional</h3>
                    <a href="{{ route('politicas.sobre-nos') }}" class="link-footer mb-3">Sobre a marca</a>
                    <a href="{{ route('politicas.trocas-devolucoes') }}" class="link-footer mb-3">Trocas e Devoluções</a>
                    <a href="{{ route('politicas.politica-de-privacidade') }}" class="link-footer mb-3">Políticas de privacidade</a>
                </div>
                <div class="col-12 col-sm-6 mb-4 mb-lg-0 col-lg-3 d-flex flex-column footer-column">
                    <h3 class="fs-5 text-uppercase">Loja</h3>
                    <a href="/profile" class="link-footer mb-3">Minha conta</a>
                    <a href="{{ route('carrinho.listar') }}" class="link-footer mb-3">Meu Carrinho</a>
                    <a href="{{ route('orderList') }}" class="link-footer mb-3">Meus pedidos</a>
                </div>
                <div class="col-12 col-sm-6 mb-5 mb-lg-0 col-lg-3 d-flex flex-column footer-column">
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
                <div class="col-12 col-sm-6 mb-4 mb-lg-0 col-lg-3 footer-column">
                    <h3 class="fs-5 text-uppercase">Formas de pagamento</h3>
                    <img src="{{ asset('images/cartao-footer.png') }}" alt="Cartões aceitos na loja">
                </div>
            </div>
        </div>

        <hr>

        <div id="copyright-footer" class="container-fluid mb-3 mt-3">
            <div class="row">
                <div class="col-3">
                    <a href="#">
                        <img src="{{ asset('images/fox.png') }}" alt="Logo Fox" class="object-fit-contain ms-3" width="65px">
                    </a>
                </div>
                <div class="col-6 d-flex align-items-center justify-content-center">
                    <i>
                        <p class="text-center">Fox Store © 2024 - Todos os direitos reservados</p>
                    </i>
                </div>
                <div class="col-3">
                    <a href="https://wa.me/+5511944880786" target="_blank">
                        <img src="{{ asset('images/whatsapp.png') }}" alt="Logo WhatsApp" class="object-fit-contain me-3 mb-3 position-fixed bottom-0 end-0" width="58px">
                    </a>
                </div>
            </div>
        </div>

    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
    <script src="{{ asset('js/ajax.js') }}"></script>

</body>

</html>