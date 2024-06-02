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

  <!-- importando jquery para ajax -->
  <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

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
                    <a href="/carrinho" class="btn text-uppercase fw-bold btn-cart d-flex align-items-center nav-text">
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
                                    <a href="{{ route('produto.search' , ['search' => '%' , 'produtoLancamentos' => true]) }}" class="nav-link nav-link-uppercase lancamentos" href='#lancamentos'>Lançamentos</a>
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

    <!--parte tafinha-->
    <main class="container-main">
        <div class="container single-product mt-5 mr-5">
            <div class="main-product mt-5">
                <div class="main-image">
                    <img src="{{ $produto->imagens->first()->IMAGEM_URL }}" alt="product-image" id="main-image">
                </div>
                <div class="product-images">
                    <div class="thumbnail-carousel">
                        @foreach ($produto->imagens->take(3) as $imagem)
                        <img src="{{ $imagem->IMAGEM_URL }}" alt="Thumbnail 1" class="thumbnail">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="view-information ms-5 mt-5">
                <h2 class="fs-2 text-left text-purple" style="color:#000000;">{{ $produto->PRODUTO_NOME }}</h2>
                @if($produto->PRODUTO_DESCONTO > 0)
                <p class="mt-3 mb-3" style="color:#595959; font-size: 20px; color:#595959">DE: R$  <span class="span-1 fs-5">{{ number_format(($produto->PRODUTO_PRECO), 2, ',', '.') }}</span></p>
                @endif
                <p class=" mb-3" style="color:#FFA500; font-size: 27px">POR: R$ {{ number_format(($produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO), 2, ',', '.') }}</p>
                @if($produto->PRODUTO_DESCONTO > 0)
                @php
                $porcentagem = (1 - ($produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO) / $produto->PRODUTO_PRECO) * 100
                @endphp
                <p class="mb-3" style="font-size: 20px; color:#595959">ou {{ number_format($porcentagem, 0 ) }}% de desconto</p>
                @endif


                <!--Adiconando parte do Lucas-->
                <div class="quantity d-flex align-items-center my-2">
                    <button type="button" class="minus-btn btn btn btn-sm mr-1" style="background-color: #43ADDA; color:white">-</button>

                    <!-- quantidade de itens -->
                    <input type="text" id="itemQtdInput" class="form-control text-center mx-1" value="1" readonly>
                    <button type="button" class="plus-btn btn btn btn-sm ml-1" style="background-color: #43ADDA; color:white">+</button>
                </div>

                <div class="button mt-3">
                    <p class="mt-4 text-secondary">Calcule o valor do frete para a sua região!</p>
                    <div class="input-group mt-3">
                        <input type="text" id="cepInput" class="form-control" placeholder="00000-000" maxlength="9">
                        <button class="btn" style="background-color: #43ADDA; color:white" type="button" id="calculateButton">Calcular</button>
                    </div>
                    <div id="freteResult" class="mt-3"></div>


                    <!-- Botao para enviar para o carrinho -->
                    <form action="{{ route('carrinho.adicionar') }}" method="POST"  class="adicionarItemForm">
                        @csrf
                        <input type="hidden" name="PRODUTO_ID" value="{{ $produto->PRODUTO_ID }}">
                        <input type="hidden" name="ITEM_QTD" id="itemQtdInputHidden" value="1">
                        <button class="btn-add-to-cart mt-4" type="submit">ADICIONAR AO CARRINHO</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container d-flex justify-content-start align-items-start mb-5 mt-3 pe-4" style="height: 40%;">
            <div class="card-4 p-4">
                <h2 class="fs-3 text-info mb-3">DESCRIÇÃO</h2>
                <p class="f-5 d-flex mb-5" style="font-size: 17px; align-self: flex-start;">{{ $produto->PRODUTO_DESC }}</p>
            </div>
        </div>
    </main>


    <!--Container Cards de Produtos Mais Vendidos-->
    <div class="container-fluid mb-5 mt-5">
        <h2 class="text-center mb-4 poetsen-one-regular">VOCÊ TAMBÉM PODE GOSTAR!</h2>
        <div class="swiper-container container-fluid d-flex justify-content-center">
            <div class="swiper-content-and-buttons">
                <div class="swiper mySwiperProdutoMaisVendidos m-0 container">
                    <div class="swiper-wrapper content">
                        @foreach ($produtoMaisVendidos as $produto)

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
                        <div class="card product-card swiper-slide">
                            <div style="height: 50%;">
                                <a class="d-flex justify-content-center align-items-center mt-2" href="{{ route('produto.show', [$produto->PRODUTO_ID])}}">
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
                                    <input type="hidden" name="ITEM_QTD" value="1">
                                    <button class="py-2 add-to-cart-box" type="submit">
                                        Adicionar ao Carrinho
                                    </button>
                                </form>
                            </div>

                            <!--Icone de desconto do Produto-->
                            @if($produto->PRODUTO_DESCONTO > 0)
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
                </div>

                <div class="swiper-button-next best-sellers-next swiper-button"></div>
                <div class="swiper-button-prev best-sellers-prev swiper-button"></div>
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
                        <button type="button" class="btn btn px-4" style="background-color: #F9A80C; color:white;">Enviar</button>
                    </div>
                </div>
            </div>

            <div id="social-midia-footer" class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col col-2 d-flex flex-column footer-column">
                        <h3 class="fs-5 text-uppercase">Institucional</h3>
                        <a href="{{ route('politicas.sobre-nos') }}" class="link-footer mb-3">Sobre a marca</a>
                        <a href="{{ route('politicas.trocas-devolucoes') }}" class="link-footer mb-3">Trocas e Devoluções</a>
                        <a href="{{ route('politicas.politica-de-privacidade') }}" class="link-footer mb-3">Políticas de privacidade</a>
                    </div>
                    <div class="col col-2 d-flex flex-column footer-column">
                        <h3 class="fs-5 text-uppercase">Loja</h3>
                        <a href="/profile" class="link-footer mb-3">Minha conta</a>
                        <a href="/profile" class="link-footer mb-3">Meu carrinho</a>
                        <a href="/profile" class="link-footer mb-3">Meus pedidos</a>
                    </div>
                    <div class="col col-2 d-flex flex-column footer-column">
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
                    <div class="col col-2 footer-column d-flex flex-column align-items-center">
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


        <!--Swiper JS-->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <script src="{{ asset('js/cookies.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        <script src="{{ asset('js/show.js') }}"></script>
        <script src="{{ asset('js/cep.js') }}"></script>
        <script src="{{ asset('js/ajax.js') }}"></script>
</body>

</html>