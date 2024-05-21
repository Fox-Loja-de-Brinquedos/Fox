<!DOCTYPE html>
<html>
    <head>
        <title>Fox carrinho</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <style>
            body {
                background-color: #F4EFEF;
            }

            .checkout-container-header {
                background-color: #43ADDA;
            }
            .checkout-container-body {
                
            }
            .cart-table td { 
                vertical-align: middle;
            }
        </style>
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
                  <div class="bg-white p-4">
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

                  <div class="bg-white p-4 mt-5">
                      <h3>Entrega</h3>
                      <label for="cep-calculate">CEP
                        <input id="cep-calculate" type="text" class="d-block">
                        <button >CALCULAR</button>
                      </label>
                      <a class="d-block" href="#">Não sei meu cep.</a>
                  </div>

              </div>
              <div class="col-4">
                  <div class="bg-light p-4">
                      <div class="cupom-area">
                        <label for="cupom">
                          Cupom de desconto
                          <input type="text" id="cupom">
                        </label>
                        <button>Aplicar</button>
                      </div>
                      <table>
                        <tr>
                          <td>Subtotal:</td>
                          <td>R$ 799,98</td>
                        </tr>
                        <tr>
                          <td>Frete:</td>
                          <td>R$ 10,00</td>
                        </tr>
                        <tr>
                          <td>Total:</td>
                          <td>R$ 809,98</td>
                        </tr>
                      </table>
                      <button>FINALIZAR A COMPRA</button>

                  </div>

                  <p><a href="#">Continuar comprando</a></p>

              </div>
            </div>
           </div>
        </div>
        
        
    </body>
</html>
