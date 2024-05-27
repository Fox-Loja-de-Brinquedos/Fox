<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <title>Fox Store {{ $search === '%' ? '' : '- ' . $search }}</title>
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
            <div class="row mt-3 mb-3 d-flex justify-content-between align-items-center" style="position: relative;">
                <div class="col-1" style="position: absolute; top: -45px">
                    <a href="">
                        <img src="{{ asset('images/logo-fox.png') }}" alt="Logotipo">
                    </a>
                </div>
                <div class="col-6" style="margin-left: 120px;">
                    <form class="form-inline" action="{{ route('produto.search') }}" method="GET">
                        <input class="form-control mr-2 searchbar" name="search" style="display: inline-block; max-width: 545px;" type="text" placeholder="Qual produto você está buscando?" style="width: 80%;" value="{{ $search === '%' ? '' : $search }}">
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
                    <a href="" class="btn text-uppercase fw-bold btn-cart d-flex align-items-center nav-text">
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
                                    <button class="nav-link nav-link-uppercase searchOption">Bonecas</button>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <button class="nav-link nav-link-uppercase searchOption">Veículos</button>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <button class="nav-link nav-link-uppercase searchOption">Pelúcias</button>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <button class="nav-link nav-link-uppercase searchOption">Jogos de cartas</button>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <button class="nav-link nav-link-uppercase searchOption">Tabuleiros</button>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <button class="nav-link nav-link-uppercase searchOption">Eletrônicos</button>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <button class="nav-link nav-link-uppercase searchOption">Outros brinquedos</button>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <a href="{{ route('produto.search' , ['search' => '%' , 'produtoLancamentos' => true]) }}" class="nav-link nav-link-uppercase lancamentos">Lançamentos</a>
                                </li>
                                <li class="nav-item custom-nav-item">
                                    <a href="{{ route('produto.search' , [ 'search' => '%', 'promotion_checkbox' => true]) }}" class="nav-link nav-link-uppercase ofertas">Ofertas</a>
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
        <aside id="filter-container">
            <div>
                <h2 class="fs-5 fw-semibold">Selecione os filtros</h2>
                <!--Filtrar por Categoria-->
                <div>
                    <p class="fs-5 ms-3 fw-semibold">Categoria</p>
                    <div class="ms-2 overflow-y-scroll" id="category-list">
                        <div class="list-group">
                            <!-- Define a última categoria selecionada -->
                            @php
                            $selectedCategoryId = request('categoria_id');
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

            <div class="d-flex justify-content-end mb-4">
                <div class="dropdown me-5">
                    <button class="dropdown-toggle filter-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ordenar
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{ request()->input('dropdownFilter') === null ? 'active' : '' }}" href="{{ route('produto.search', ['categoria_id' => $selectedCategoryId, 'search' => $search, 'minValue' => request()->input('minValue'), 'maxValue' => request()->input('maxValue'), 'promotion_checkbox' => $promotionCheckbox]) }}">- Sem Filtro -</a>
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
                    </ul>
                </div>
            </div>


            <!--Container dos produtos e mensagem de produto não encontrado-->
            <div class="container-fluid d-flex justify-content-center">
                @if($qtdProdutos > 0)
                <!--Cards Container-->
                <div class="d-flex justify-content-left w-100 row flex-wrap gap-4 ps-4">
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
                    <div class="card product-card" style="width: 18rem;">
                        <div class="d-flex justify-content-center align-items-center" style="height: 50%;">
                            <a href="{{ route('produto.show', [$produto->PRODUTO_ID])}}">
                                @if ($produto->imagens->isNotEmpty())
                                <img src="{{ $produto->imagens->first()->IMAGEM_URL }}" class="card-img-top card-img-resize" alt="Imagem do produto">
                                @else
                                <img src="https://multilit.com.br/wp-content/uploads/2020/03/Produto-sem-foto.png" class="card-img-top card-img-resize" alt="Imagem padrão">
                                @endif
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="{{ route('produto.show', [$produto->PRODUTO_ID])}}">
                                <h5 class="card-title">{{ $produto->PRODUTO_NOME }}</h5>
                                <b>
                                    <p class="card-text">R$ {{ number_format(($produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO), 2, ',', '.') }}</p>
                                </b>
                            </a>
                            <p>{{ $qtd_parcelas }}x de R$ {{ number_format($valor_parcela, 2, ',', '.') }} sem juros</p>

                            <form action="{{ route('carrinho.adicionar') }}" method="POST">
                            @csrf
                                <input type="hidden" name="PRODUTO_ID" value="{{ $produto->PRODUTO_ID }}">
                                <button type="submit" class="btn btn-warning mt-3" style="width: 100%; height: 50px; font-size: 23px; color: white;">
                                    ADICIONAR AO CARRINHO
                                </button>
                        </form>
                        </div>
                        
                        

                        <!--Exibe desconto caso haja-->
                        @if($produto->PRODUTO_DESCONTO > 0)
                        @php
                        //Regra de 3 para tirar porcentagem
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
            @endif



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

            <a href="https://wa.me/+5511944880786" target="_blank"><img src="{{ asset('images/whatsapp.png') }}" alt="Logo WhatsApp" class="object-fit-contain me-3 mb-3 position-fixed bottom-0 end-0" width="58px">
            </a>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>

</body>

</html>