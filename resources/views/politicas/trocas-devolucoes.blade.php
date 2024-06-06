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
            <input class="form-control mr-2 searchbar d-inline-block" name="search" type="text" placeholder="Pesquisar produto...">
            <button class="btn btn-primary btn-search" type="submit"><i class="fa fa-search"></i></button>
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
            <ul class="dropdown-menu">
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
                  <input class="form-control mr-2 searchbar d-inline-block mt-3" name="search" type="text" autocomplete="off" placeholder="Pesquisar produto...">
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
                  <a href="{{ route('produto.search')}}" class="nav-link nav-link-uppercase">Outros brinquedos</a>
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

  <!--inicio do texto-->

  <div class="container-fluid py-3 mt-3 mb-3" style="background-color: #43ADDA; color: white;">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h1>TROCAS E DEVOLUÇÕES</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="mt-5 mb-5">Garantia</h3>
        <p class="mb-5">
          Todos os nossos brinquedos possuem garantia de 90 (noventa) dias contados a partir da compra. Esta garantia cobre qualquer imperfeição que o produto possa apresentar, como falta de peças, funcionamento inadequado entre outros. O prazo máximo de resolução é de 30 dias corridos, a contar da entrada da reclamação em nosso sistema.
          O atendimento em garantia requer a nota fiscal e que o brinquedo esteja completo e na embalagem original. A garantia não cobre problemas provocados pela má utilização do produto. E também não se estende para possíveis insatisfações ou escolha equivocada no momento da compra. Com exceção a produtos comprados pela internet, pois há o direito de arrependimento, com o prazo de 7 (sete) dias contados a partir do recebimento do produto, para saber mais informações vide Política de Trocas e devoluções.
          Para acionar a garantia, entre em contato conosco através do nosso SAC

        </p>
        <h3 class="mt-5 mb-5">Segurança do Brinquedo</h3>
        <p class="mt-5 mb-5">
          Nosso principal objetivo como empresa é entregar produtos de qualidade, sempre visando o bem-estar e a integridade física das crianças. Por este motivo, todos os nossos produtos são certificados pelo INMETRO (Instituto Nacional de Metrologia, Qualidade e Tecnologia).
          Todos os nossos produtos importados são escolhidos cuidadosamente, tendo em vista a diversão, a experiência e a segurança de nossos pequenos.

        </p>
        <h3 class="mt-5 mb-5">Direito de Arrependimento</h3>
        <p class="mt-5 mb-5">
          Segundo o art. 49 do Código de Defesa do Consumidor e Decreto 7.962/2013, o consumidor tem até 7 (sete) dias corridos, contados a partir da data de entrega do produto, para desistir de qualquer compra realizada pela internet.
          Em caso de desistência, solicitamos que você entre em contato com o nosso Atendimento ao Consumidor, durante o período estabelecido pelo CDC, no qual você será orientado sobre como proceder. A restituição do valor pago ocorrerá somente após o recebimento do pedido e avaliação de sua condição.
          O estorno de pagamentos realizados via cartão de crédito pode ocorrer em até duas faturas subsequentes à data de autorização do pedido de cancelamento.
        </p>
        <h3 class="mt-5 mb-5">Troca por defeito</h3>
        <p class="mt-5 mb-5">
          Se o produto apresentar defeito de fabricação, você deve entrar em contato com o nosso SAC em até 90 (noventa) dias corridos, contados a partir da entrega, segundo o art. 26 do Código de Defesa do Consumidor e Decreto.
          Após o início do atendimento, caberá a Candide decidir se você terá que apresentar algo que comprove o defeito, como foto ou vídeo. Porém, o envio do DANFE é imprescindível. O processo passará pela área de controle de qualidade, a qual analisará o seu caso. O prazo de resolução é de, no máximo, 30 dias corridos.
          Em caso de falta ou defeito em componentes do produto, apenas as peças defeituosas serão repostas.
          Se não possuirmos o produto para efetuar a troca, um voucher será gerado no valor do item pago.
        </p>
        <h3 class="mt-5 mb-5">Troca por avaria</h3>
        <p class="mt-5 mb-5">
          Se o produto tiver alguma avaria ou a embalagem estiver violada, não aceite o recebimento. Caso receba o produto, comunique o ocorrido a empresa no mesmo dia através do Atendimento ao Consumidor.
        </p>
      </div>
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
          <a href="{{ route('profile') }}" class="link-footer mb-3">Minha conta</a>
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
        <div class="col-12 col-sm-6 mb-4 mb-lg-0 col-lg-3 footer-column d-flex flex-column align-items-center">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>