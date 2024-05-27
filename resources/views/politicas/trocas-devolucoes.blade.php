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
          <a href="/profile"><button class="btn text-uppercase fw-bold btn-login"><img src="{{ asset('images/icon-account.png') }}" alt=""> Entrar /
              Cadastrar</button></a>
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
          <a href="/profile"class="link-footer mb-3">Minha conta</a>
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