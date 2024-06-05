<!DOCTYPE html>
<html lang="pt-br">

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

  <link rel="stylesheet" href="../css/accountDetails.css">
  <link rel="stylesheet" href="../css/header.css">
</head>

<body>

  <header>
    <div class="container">
      <div class="row pt-4 pb-2">
        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center justify-content-md-start">
          <a href="/" class="voltar-a-loja"><img src="images/de-volta.png" alt="" width="23px" height="20px"> Voltar à loja</a></div>
        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center py-3 py-md-0">
          <img src="images/fox1.svg" alt="" width="116px" height="122px">
        </div>
        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center justify-content-md-end">
          <img src="images/seguro.png" alt="" width="23px" height="20px">Ambiente 100% seguro
        </div>
      </div>
    </div>
  </header>

  <hr>

  <main>

    <div class="container account-details-container">
      <div class="title-section">
        <h1 class="title-details">DETALHES PESSOAIS</h1>
      </div>

      <section class="profile-pref">
        <h2 class="title-detail">PERFIL</h2>
        @if(session('nameSucess'))
        <div class="alert alert-success">
          {{ session('nameSucess') }}
        </div>
        @endif

        <form class="formProfile profileForm" action="{{ route('update.name') }}" method="POST">
          @csrf
          <label for="name" class="name-label">Nome</label>
          <input type="text" placeholder="{{ Auth::user()->USUARIO_NOME }}" name="name" id="name" required>
          <button class="btn-detail">ATUALIZAR PERFIL</button>
        </form>
      </section>

      <section class="profile-contact">
        <h2 class="title-detail">CONTATO</h2>

        <div class="profile-email">
          <label>E-mail</label>
          <p>{{ Auth::user()->USUARIO_EMAIL }}</p>
          @if ($errors->has('new_email') || session('errorPassEmail'))
          <div class="alert alert-danger">
            @if ($errors->has('new_email'))
            @foreach ($errors->get('new_email') as $error)
            {{ $error }}
            @endforeach
            @endif

            @if (session('errorPassEmail'))
            {{ session('errorPassEmail') }}
            @endif
          </div>
          @endif

          @if(session('successEmail'))
          <div class="alert alert-success">
            {{ session('successEmail') }}
          </div>
          @endif
        </div>


        <form class="formProfile " action="{{ route('update.email') }}" method="POST">
          @csrf
          <input type="text" name="new_email" placeholder="Novo E-mail" required>
          <input type="password" name="password" placeholder="Senha Atual" required>
          <button class="btn-detail">ATUALIZAR ENDEREÇO DE E-MAIl</button>
        </form>
      </section>

      <section class="profile-password">
        <h2 class="title-detail">SENHA</h2>
        <p class="passWarning">A nova senha deve ter ao menos 8 caracteres</p>
        @if ($errors->has('current_password') || $errors->has('new_password') || session('currentPassError'))
        <div class="alert alert-danger">
          @if ($errors->has('current_password') || $errors->has('new_password'))
          @foreach ($errors->all() as $error)
          {{ $error }}
          @endforeach
          @endif

          @if(session('currentPassError'))
          {{ session('currentPassError') }}
          @endif
        </div>
        @endif

        @if(session('successPassword'))
        <div class="alert alert-success">
          {{ session('successPassword') }}
        </div>
        @endif

        <form class="formProfile" action="{{ route('update.password') }}" method="POST">
          @csrf
          <input type="password" name="current_password" placeholder="Senha Atual" required>
          <input type="password" name="new_password" placeholder="Nova Senha" required>
          <button class="btn-detail">ALTERAR SENHA</button>
        </form>

      </section>
    </div>

  </main>

 
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
              <div class="row justify-content-center">
                <div class="col-12 col-sm-4 mb-2 mb-sm-0">
                  <input type="email" class="form-control text-us-input w-100" placeholder="Seu nome">
                </div>
                <div class="col-12 col-sm-4 mb-2 mb-sm-0">
                  <input type="email" class="form-control text-us-input w-100" placeholder="E-mail">
                </div>
                <div class="col-12 col-sm-3 mb-2 mb-sm-0">
                  <button type="button" class="btn btn px-4 w-100" style="background-color: #F9A80C; color:white;">Enviar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
          <a href="/profile" class="link-footer mb-3">Meu Carrinho</a>
          <a href="/profile" class="link-footer mb-3">Meus pedidos</a>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>