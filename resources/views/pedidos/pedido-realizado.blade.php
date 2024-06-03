<!DOCTYPE html>
<html>

<head>
  <title>Finalizar compra</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link href="{{ asset('css/pedidos.css') }}" rel="stylesheet">
</head>

<body>
  <div class="container-fluid checkout-container-header">
    <header class="container py-4">
      <div class="row">
        <div class="col-3">
          <a href="/">
            <img src="{{ asset('images/logo-fox-carrinho.png') }}" alt="Logo" class="img-fluid">
          </a>
        </div>
        <div class="col-6 d-flex align-content-center flex-wrap">
          <div class="w-100">
            <div class="steps-line"></div>
            <div class="steps-btns d-flex justify-content-between">
              <div class="step-item done text-center">
                    <div class="step-circle mx-auto">1</div>
                    <span class="step-label mt-1 d-block">Carrinho</span>
              </div>
              <div class="step-item done text-center">
                    <div class="step-circle mx-auto">2</div>
                    <span class="step-label mt-1 d-block">Dados pessoais</span>
              </div>
              <div class="step-item done text-center">
                    <div class="step-circle mx-auto">3</div>
                    <span class="step-label mt-1 d-block">Entrega</span>
              </div>
              <div class="step-item done text-center">
                    <div class="step-circle mx-auto">4</div>
                    <span class="step-label mt-1 d-block">Pagamento</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3 text-end">
          <img src="{{ asset('images/icone-seguro.png') }}">
        </div>
      </div>
    </header>
  </div>

  <div class="container-fluid checkout-container-body">
    <div class="container mt-5">
      <div class="row gx-5  d-flex justify-content-center">

        <div class="col-8">
          <div class="container-box-pedido-realizado text-center">
            <h3 class="px-4">Seu pedido foi realizado com sucesso!</h3>
            <p>Em breve voce receberá um email com os detalhes do pedido.</p>
            <span class="info-box"><img src="{{asset('images/icone-pedido-realizado.png')}}" alt="">Pagamento Aprovado</span>
          </div>

          <p class="text-center"><a class="btn-back-to-store" href="/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
              </svg> Voltar para a loja</a></p>
        </div>
      </div>
    </div>
  </div>


</body>

</html>