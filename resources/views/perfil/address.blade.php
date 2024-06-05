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
  
  <link rel="stylesheet" href="../css/address.css">
  <link rel="stylesheet" href="../css/header.css">
    
</head>
<body>

  <header>
    <div class="container">
      <div class="row pt-4 pb-2">
        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center justify-content-md-start">
          <a href="/profile" class="voltar-a-loja"><img src="images/de-volta.png" alt="" width="23px" height="20px"> Minha conta</a></div>
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
    <div class="container address-container mt-5">
      
      <div class="welcome-section">
      <h1>ENDEREÇO</h1>
      </div>

      <section> 
      <div class="address-save">
      <h2 class="address-save-title">ENDEREÇO CADASTRADO</h2>
      <div class="progress-bar"></div>

      <ul class="adress-list"> 
          @isset($endereco)
              <li class="adreess-item address-send-title">ENDEREÇO DE ENTREGA</li>
              <li class="adreess-item">{{ $endereco->ENDERECO_NOME }}</li>
              <li class="adreess-item">{{ $endereco->ENDERECO_LOGRADOURO }}, {{ $endereco->ENDERECO_NUMERO }}</li>
              <li class="adreess-item">{{ $endereco->ENDERECO_CIDADE }}</li>
              <li class="adreess-item">{{ $endereco->ENDERECO_ESTADO }}</li>
              <li class="adreess-item">{{ substr_replace($endereco->ENDERECO_CEP, '-', 5, 0) }}</li>
              <li class="adreess-item">{{ $endereco->ENDERECO_COMPLEMENTO }}</li>

              <div class="address-button">
              <li><button class="address-action" onclick="showUpdateSection()">Modificar <span> > </span></button></li>

              <li>
              <form action="{{ route('address.remove') }}" method="POST">
                @csrf
                <button type="submit" class="address-action">Remover ></button></form>
              </li>
              </div>

              @else
              <li class="adreess-item">Nenhum endereço cadastrado</li>
              <button id="showAddressForm" class="save-button marginBotao"  >ADICIONAR ENDEREÇO</button>
              @endisset
      </ul>
      </div>
      </section>

      <section>
        <div class="new-address" style="display: none;">

        <h2 class="address-add-title">ADICIONAR UM ENDEREÇO</h2>
        <div class="progress-bar"></div>

        <form class="address-form" action="{{ route('address.store') }}" method="POST">
          @csrf
          <input type="hidden" name="ENDERECO_NOME" value="Principal">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
              <input class="address-form-item formLog" type="text" placeholder="Endereço" name="ENDERECO_LOGRADOURO" required> 
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <input class="address-form-item formNumber" type="number" placeholder="Número" name="ENDERECO_NUMERO" required> 
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <input class="address-form-item formCity" type="text" placeholder="Cidade" name="ENDERECO_CIDADE" required> 
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <input class="address-form-item formEstate" type="text" placeholder="Estado-UF" name="ENDERECO_ESTADO" maxlength="2" required> 
            </div>
            <div class="col-12 col-sm-6 col-md-4">
             <input class="address-form-item formZipCode" type="text" placeholder="CEP" name="ENDERECO_CEP" maxlength="9" required > 
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <input class="address-form-item formComplement" type="text" placeholder="Complemento" name="ENDERECO_COMPLEMENTO"> 
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <button class="save-button">SALVAR ENDEREÇO</button>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <button class="cancel-button">Cancelar</button>
            </div>
          </div>
          
          
          
          
        </form>
        </div>
      </section>

      <section id="updateSection" style="display: none;">
        <div class="updateAddress">

        <h2 class="address-add-title">ATUALIZAR ENDEREÇO</h2>
        <div class="progress-bar"></div>

        <form class="address-form" action="{{ isset($endereco) ? route('address.update', $endereco->ENDERECO_ID) : '#' }}" method="POST">
          @csrf
          @isset($endereco)
              @method('PUT')
          @endisset    

          <input type="hidden"name="ENDERECO_NOME"
              value="{{ isset($endereco) ? $endereco->ENDERECO_NOME : '' }}">

          <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
              <input class="address-form-item formLog" type="text" placeholder="Endereço" name="ENDERECO_LOGRADOURO"
            required value="{{ isset($endereco) ? $endereco->ENDERECO_LOGRADOURO : '' }}">
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <input class="address-form-item formNumber" type="number" placeholder="Número" name="ENDERECO_NUMERO"
                required value="{{ isset($endereco) ? $endereco->ENDERECO_NUMERO : '' }}">
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <input class="address-form-item formCity" type="text" placeholder="Cidade" name="ENDERECO_CIDADE"
                required value="{{ isset($endereco) ? $endereco->ENDERECO_CIDADE : '' }}">
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <input class="address-form-item formEstate" type="text" placeholder="Estado-UF" name="ENDERECO_ESTADO" maxlength="2"
                required value="{{ isset($endereco) ? $endereco->ENDERECO_ESTADO : '' }}"> 
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <input class="address-form-item formZipCode" id="cepUpdate" type="text" placeholder="CEP" name="ENDERECO_CEP" maxlength="9" 
                required value="{{ isset($endereco) ? $endereco->ENDERECO_CEP : '' }}" >
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <input class="address-form-item formComplement" type="text" placeholder="Complemento" name="ENDERECO_COMPLEMENTO" 
                value="{{ isset($endereco) ? $endereco->ENDERECO_COMPLEMENTO : '' }}">
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <button class="save-button">SALVAR ALTERAÇÕES</button>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <button type="button" class="cancel-button" id="cancelUpdate">Cancelar</button>
            </div>
          </div>
        </form>
        </div>

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

  <script src="{{ asset('js/script.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
<script src="/js/address.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>