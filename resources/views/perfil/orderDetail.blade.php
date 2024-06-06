<!DOCTYPE html>
<html lang="en">

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

  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/orderDetail.css">
</head>

<body>

  <header>
    <div class="container">
      <div class="row pt-4 pb-2">
        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center justify-content-md-start">
          <a href="/orderList" class="voltar-a-loja"><img src="/images/de-volta.png" alt="" width="23px" height="20px"> Meus pedidos</a>
        </div>
        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center py-3 py-md-0">
          <a href="/">
          <img src="/images/fox1.svg" alt="" width="116px" height="122px">
          </a>
        </div>
        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center justify-content-md-end">
          <img src="/images/seguro.png" alt="" width="23px" height="20px">Ambiente 100% seguro
        </div>
      </div>
    </div>
  </header>

  <hr>

  <main>
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-lg-4 mb-5 mb-lg-0">
          <div class="details">
            <h1 class="orderId">Pedido #{{ $pedido->PEDIDO_ID }}</h1>
            <h2 class="detailsTitle">Detalhes do Pedido</h2>

            <div class="orderData">
              <p><span>Data:</span> {{ \Carbon\Carbon::parse($pedido->PEDIDO_DATA)->format('d/m/Y') }}</p>
              <p><span>Status:</span> {{ $pedido->status->STATUS_DESC }}</p>
              <p><span>Pagamento:</span> Aguardando</p>
            </div>

            <div class="orderAddress">
              <p class="titleAddress">Endereço de Envio:</p>
              <p>{{ $user->USUARIO_NOME }}</p>
              <p>{{ $pedido->endereco->ENDERECO_LOGRADOURO }}, {{ $pedido->endereco->ENDERECO_NUMERO }}</p>
              <p>{{ isset($pedido->endereco->ENDERECO_COMPLEMENTO) ? ($pedido->endereco->ENDERECO_COMPLEMENTO . ', ') : '' }}{{ $pedido->endereco->ENDERECO_CEP }}</p>
              <p>{{ $pedido->endereco->ENDERECO_CIDADE }}, {{ $pedido->endereco->ENDERECO_ESTADO }}</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-8">
          <div class="orderItem">
            <div class="overflow-x-auto">
              <table class="table">
                <div class="tableOrder">
                  <tr class="tableHead">
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                  </tr>

                  @foreach ($pedido->itens as $item)
                  <tr class="tableItem">
                    @if ($item->produto->imagens->isNotEmpty())
                    <td class="align-middle"> <img src="{{ $item->produto->imagens->first()->IMAGEM_URL }}" alt="Imagem do produto">
                      @endif
                      <span>{{ $item->produto->PRODUTO_NOME }}</span>
                    </td>
                    <td class="preco text-nowrap align-middle">R$ {{ number_format($item->ITEM_PRECO, 2, ',', '.') }}</td>
                    <td class="qtd align-middle">{{ $item->ITEM_QTD }}</td>
                    <td class="text-nowrap align-middle">R$ {{ number_format($item->ITEM_PRECO * $item->ITEM_QTD, 2, ',', '.') }}</td>
                  </tr>
                  @endforeach
                </div>
              </table>
            </div>

            <div class="orderPrice">
              <p><span>DESCONTO:</span> -R${{ number_format($pedido->totalDesconto, 2, ',', '.') }}</p>
              <p><span>SUBTOTAL:</span> R$ {{ number_format($pedido->totalPrecoBruto, 2, ',', '.') }}</p>
              <p class="orderTotal">TOTAL: R$ {{ number_format($pedido->totalPrecoComDesconto, 2, ',', '.') }}</p>
            </div>
          </div>
        </div>
      </div>
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


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>