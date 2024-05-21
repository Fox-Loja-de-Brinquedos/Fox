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
                      <a href="index.html">
                        <img src="{{ asset('images/logo-fox-carrinho.png') }}" alt="Logo" class="img-fluid">
                      </a>
                    </div>
                    <div class="col-6 d-flex align-content-center flex-wrap">
                      <img src="{{ asset('images/steps-identificacao.png') }}" alt="Imagem 1" >
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
             <div class="col-7">
                <form action="">
                    <!--
                    <div class="bg-white p-4 container-box">
                        <h3>Dados pessoais</h3>
                        <p>Solicitamos apenas informações essenciais</p>
                        <div id="dados-pessoais">
                            <label for="nome">Nome completo
                                <input type="text" name="nome" id="nome" class="input-1-1">
                            </label>
                            <label for="cpf">CPF
                                <input type="text" name="cpf" id="cpf" class="input-1-1">
                            </label>
                            <label for="email">E-mail
                                <input type="email" name="email" id="email" class="input-1-1">
                            </label>
                            <label for="senha">Senha
                                <input type="password" name="senha" id="senha" class="input-1-1">
                            </label>
                            <label for="confirmar-senha">Confirme a senha
                                <input type="password" name="confirmar-senha" id="confirmar-senha" class="input-1-1">
                            </label>
                        </div>
                    </div>
                    -->

                    <div class="bg-white p-4 container-box">
                        <h3>Entrega</h3>
                        <p>Solicitamos apenas informações essenciais</p>
                        <div id="entrega">
                            <label for="cep">CEP
                                <input type="text" name="cep" id="cep" class="input-1-1">
                            </label>
                            <label for="endereco">Endereço
                                <input type="text" name="endereco" id="endereco" class="input-1-1">
                            </label>
                            <label for="numero">Número
                                <input type="number" name="numero" id="numero" class="input-1-1">
                            </label>
                            <label for="bairro">Bairro
                                <input type="text" name="bairro" id="bairro" class="input-1-1">
                            </label>
                            <label for="cidade">Cidade
                                <input type="text" name="cidade" id="cidade" class="input-1-1">
                            </label>
                            <label for="estado">Estado
                                <input type="text" name="estado" id="estado" class="input-1-1">
                            </label>
                        </div>
                    </div>

                    <div class="bg-white p-4 my-5 container-box">
                        <h3>Formas de pagamento</h3>
                        <p>Solicitamos apenas informações essenciais</p>
                        <div id="forma-de-pagamento">
                            <div   class="mb-3"><input type="radio" name="boleto" id="boleto"><label for="boleto" class="opcao-pagamento"> Boleto</label></div>
                            <button id="finalizar-pedido" class="pedido-btn">FINALIZAR PEDIDO</button>
                        </div>
                    </div>
                    
                </form>
             </div>

             <div class="col-5">
                <div class="bg-white pt-4 container-box">
                    <h3 class="px-4">Resumo da compra</h3>
                    <table class="table">
                        <tr>
                            <td class="ps-4"><img src="{{asset('images/product.png')}}" alt=""><span>2x</span></td>
                            <td>
                                <p>Urso de pelúcia Stitch azul fofinho</p>
                                <p>R$ 399,99</p>
                            </td>
                            <td  class="pe-4">R$ 799,98</td>
                        </tr>
                    </table>

                    <table class="table resumo-table">
                        <tr>
                          <td class="ps-4">Subtotal:</td>
                          <td  class="pe-4">R$ 799,98</td>
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

                </div>

                <p class="text-center"><a class="btn-back-to-store" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
</svg> Continuar comprando</a></p>
             </div>
           </div>
          </div>
       </div>
       
       
   </body>
</html>
