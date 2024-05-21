<!DOCTYPE html>
<html>
    <head>
        <title>Fox carrinho</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <link href="{{ asset('css/pedidos.css') }}" rel="stylesheet">
    </head>
    <body>
         <div class="container-fluid checkout-container-header">
            <header class="container py-4">
                <div class="row">
                    <div class="col-3">
                      <a href="index.html">
                        <img src="{{ asset('images/logo-fox-carrinho.png') }}" alt="Logo" class="img-fluid">
                      </a>
                    </div>
                    <div class="col-6 d-flex align-content-center flex-wrap">
                      <img src="{{ asset('images/steps2.png') }}" alt="Imagem 1" >
                    </div>
                    <div class="col-3 text-end">
                      <img src="{{ asset('images/icone-seguro.png') }}">
                    </div>
                </div>
            </header>
         </div>
        <div class="container-fluid checkout-container-body">
           <div class="container mt-5">
            <div class="row gx-5">
              <div class="col-8">
                  <div class="bg-white p-4 container-box">
                    <table class="table cart-table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail"></th>
                                <th class="product-name">Produto</th>
                                <th class="product-price">Preço</th>
                                <th class="product-quantity">Quantidade</th>
                                <th class="product-subtotal">Subtotal</th>
                                <th class="product-remove"></th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td class="product-thumbnail"><img src="img/product.png" alt=""></td>
                              <td class="product-name">Pelúcia Stitch Fofinha</td>
                              <td class="product-price">R$ 399,99</td>
                              <td class="product-quantity">2</td>
                              <td class="product-subtotal">R$ 799,98</td>
                              <td class="product-remove"><a href="#">X</a></td>
                          </tr>
                          <tr>
                              <td class="product-thumbnail"><img src="img/product.png" alt=""></td>
                              <td class="product-name">Pelúcia Stitch Fofinha</td>
                              <td class="product-price">R$ 399,99</td>
                              <td class="product-quantity">2</td>
                              <td class="product-subtotal">R$ 799,98</td>
                              <td class="product-remove"><a href="#">X</a></td>
                          </tr>
                        </tbody>
                    </table>
                  </div>

                  <div class="bg-white p-4 mt-5 container-box">
                      <h3 class="mb-3">Entrega</h3>
                      <label for="cep-calculate">CEP
                        <div class="my-1">
                            <input id="cep-calculate" type="text" class="">
                            <button class="btn-calculate">Calcular</button>
                        </div>
                      </label>
                      <a class="d-block" href="#">Não sei meu cep.</a>
                  </div>

              </div>
              <div class="col-4">
                  <div class="bg-white py-4 container-box">
                      <div class="cupom-area px-4">
                        <label for="cupom">
                          Cupom de desconto
                          <div class="mt-1 mb-2">
                            <input type="text" id="cupom">
                            <button class="btn-calculate">Aplicar</button>
                          </div>
                        </label>
                      </div>
                      <table class="table">
                        <tr>
                          <td class="ps-4">Subtotal:</td>
                          <td class="pe-4">R$ 799,98</td>
                        </tr>
                        <tr>
                          <td class="ps-4">Frete:</td>
                          <td class="pe-4">R$ 10,00</td>
                        </tr>
                        <tr>
                          <td class="ps-4">Total:</td>
                          <td class="pe-4">R$ 809,98</td>
                        </tr>
                      </table>
                      <div class="text-center mt-3">
                        <button class="pedido-btn">FINALIZAR A COMPRA</button>
                      </div>

                  </div>

                  <p class="text-center mt-3"><a class="btn-back-to-store" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
</svg> Continuar comprando</a></p>

              </div>
            </div>
           </div>
        </div>
        
        
    </body>
</html>
