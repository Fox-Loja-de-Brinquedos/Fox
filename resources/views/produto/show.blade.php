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
  <main class="conatainer-grid">
    <div class="container single-product">
      <div class="card-image mb-5">
        <img src="{{ $produto->imagens->first()->IMAGEM_URL }}" alt="product-image" id="main-image">
        <div class="product-images">
          <div class="thumbnail-carousel mt-5 me-5">
            @foreach ($produto->imagens as $imagem)
            <img style="border: 2px solid #ddd;" src="{{ $imagem->IMAGEM_URL }}" alt="Thumbnail 1" class="thumbnail">
            @endforeach
          </div>
        </div>
      </div>

      <div class="view-information ms-5">
        <h2 class="fs-3 text-left text-purple mt-5" style="color:purple;">{{ $produto->PRODUTO_NOME }}</h2>
        @if($produto->PRODUTO_DESCONTO > 0)
        <p class="p-1 fs-5 mb-1 " style="color:purple;">DE: <span class="span-1 fs-5">{{ $produto->PRODUTO_PRECO }}</span></p>
        @endif
        <p class="p-2 mb-1" style="font-size: 25px;">por:{{ $produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO }}</p>
        @if($produto->PRODUTO_DESCONTO > 0)
        @php
        $porcentagem = (1 - ($produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO) / $produto->PRODUTO_PRECO) * 100
        @endphp
        <p class="p-2 mb-1" style="font-size: 20px;">ou {{ number_format($porcentagem, 0) }}% de desconto</p>
        @endif

        <div class="quantity d-flex align-items-center my-2">
          <button class="minus-btn btn btn btn-sm mr-1" style="background-color: #43ADDA; color:white">-</button>
          <input type="text" class="form-control text-center mx-1" value="1" readonly>
          <button class="plus-btn btn btn btn-sm ml-1" style="background-color: #43ADDA; color:white">+</button>
        </div>
        <div class="button mt-5">
          <p class="mt-5 text-secondary">Calcule o valor do frete para a sua região!</p>
          <div class="input-group mb-3">
            <input type="text" id="cepInput" class="form-control" placeholder="00000-000" maxlength="9">
            <button class="btn btn" style="background-color: #43ADDA; color:white" type="button" id="calculateButton">Calcular</ button>
          </div>
          <div id="freteResult" class="mt-3"></div>


          <div id="freteResult" class="mt-3"></div>
          <script>
            function formatCEP(value) {
              value = value.replace(/\D/g, '');

              if (value.length > 5) {
                value = value.slice(0, 5) + '-' + value.slice(5, 8);
              }
              return value;
            }

            document.getElementById('cepInput').addEventListener('input', function() {
              this.value = formatCEP(this.value);
            });

            document.getElementById('calculateButton').addEventListener('click', function() {
              var cep = document.getElementById('cepInput').value.replace('-', '');
              var freteResultDiv = document.getElementById('freteResult');

              freteResultDiv.innerText = '';
              if (cep.length === 8) {
                var frete = 10.00;
                var freteText = 'SEDEX: Em até 4 dias úteis R$: ' + frete.toFixed(2);

                freteResultDiv.innerText = freteText;
              }
            });
          </script>

          <!-- Formulário para adicionar ao carrinho -->
          <form action="{{ route('carrinho.adicionar') }}" method="POST">
            @csrf
            <input type="hidden" name="PRODUTO_ID" value="{{ $produto->PRODUTO_ID }}">
            <input type="hidden" name="ITEM_QTD">
            <button class="py-2 add-to-cart-box" type="submit">
              ADICIONAR AO CARRINHO
            </button>
          </form>
        </div>
      </div>
    </div>
    <div class="container d-flex justify-content-start align-items-start mb-5 mt-5" style="height: 40%;">
      <div class="card-4 p-4">
        <h2 class="fs-3 text-info mb-3">DESCRIÇÃO</h2>
        <p class="f-5 d-flex mb-5" style="font-size: 17px; align-self: flex-start;">{{ $produto->PRODUTO_DESC }}</p>
      </div>
    </div>


    <div class="container mb-5 mt-5">
      <h2 class="text-center mb-4">QUEM VIU TAMBÉM COMPROU</h2>
      <div class="row d-flex justify-content-around">

        <!--Card produto 1-->
        <div class="card product-card" style="width: 18rem;">
          <div class="d-flex justify-content-center align-items-center" style="height: 50%;">
            <img src="{{ asset('images/stitch.jpg') }}" class="card-img-top card-img-resize" alt="Imagem do produto">
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">Lorem Ipsum is simply dummy</h5>
            <b>
              <p class="card-text">R$ 489,00</p>
            </b>
            <p>6x de R$ 81,50 sem juros</p>
          </div>

          <form action="{{ route('carrinho.adicionar') }}" method="POST">
            @csrf
            <input type="hidden" name="PRODUTO_ID" value="{{ $produto->PRODUTO_ID }}">
            <button type="submit" class="btn btn-warning mt-3" style="width: 100%; height: 50px; font-size: 23px; color: white;">
              ADICIONAR AO CARRINHO
            </button>
          </form>

        </div>

        <!--Card produto 2-->
        <div class="card product-card" style="width: 18rem;">
          <div class="d-flex justify-content-center align-items-center" style="height: 50%;">
            <img src="{{ asset('images/urso.jpg') }}" class="card-img-top card-img-resize" alt="Imagem do produto">
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">Lorem Ipsum is simply dummy</h5>
            <b>
              <p class="card-text">R$ 489,00</p>
            </b>
            <p>6x de R$ 81,50 sem juros</p>
            <a href="#" class="text-decoration-none">
              <div class="py-2 add-to-cart-box">
                Adicionar ao Carrinho
              </div>
            </a>
          </div>
        </div>

        <!--Card produto 3-->
        <div class="card product-card" style="width: 18rem;">
          <div class="d-flex justify-content-center align-items-center" style="height: 50%;">
            <img src="{{ asset('images/macaco.jpg') }}" class="card-img-top card-img-resize" alt="Imagem do produto">
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">Lorem Ipsum is simply dummy</h5>
            <b>
              <p class="card-text">R$ 489,00</p>
            </b>
            <p>6x de R$ 81,50 sem juros</p>
            <a href="#" class="text-decoration-none">
              <div class="py-2 add-to-cart-box">
                Adicionar ao Carrinho
              </div>
            </a>
          </div>
        </div>

        <!--Card produto 4-->
        <div class="card product-card" style="width: 18rem;">
          <div class="d-flex justify-content-center align-items-center" style="height: 50%;">
            <img src="{{ asset('images/madruga.jpg') }}" class="card-img-top card-img-resize" alt="Imagem do produto">
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">Lorem Ipsum is simply dummy</h5>
            <b>
              <p class="card-text">R$ 489,00</p>
            </b>
            <p>6x de R$ 81,50 sem juros</p>
            <a href="#" class="text-decoration-none">
              <div class="py-2 add-to-cart-box">
                Adicionar ao Carrinho
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <script>
      var MainImg = document.getElementById("main-image");
      var smallimg = document.getElementsByClassName("thumbnail");
      smallimg[0].onclick = function() {
        MainImg.src = smallimg[0].src;
      }
      smallimg[1].onclick = function() {
        MainImg.src = smallimg[1].src;
      }
      smallimg[2].onclick = function() {
        MainImg.src = smallimg[2].src;
      }
    </script>

    <script src="script.js"></script>

  </main>

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
          <a href="{{ route('politicas.sobre-nos') }}" class="link-footer mb-3">Sobre a marca</a>
          <a href="{{ route('politicas.trocas-devolucoes') }}" class="link-footer mb-3">Trocas e Devoluções</a>
          <a href="{{ route('politicas.politica-de-privacidade') }}" class="link-footer mb-3">Políticas de privacidade</a>
        </div>
        <div class="col col-2 d-flex flex-column footer-column">
          <h3 class="fs-5 text-uppercase">Loja</h3>
          <a href="/profile" class="link-footer mb-3">Minha conta</a>
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


  <script src="{{ asset('js/show.js') }}"></script>

</body>

</html>