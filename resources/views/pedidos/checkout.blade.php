<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
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
                       <img src="img/logo-fox.png" alt="Logo" class="img-fluid">
                     </a>
                   </div>
                   <div class="col-6 d-flex align-content-center flex-wrap">
                     <img src="img/steps-identificacao.png" alt="Imagem 1" >
                   </div>
                   <div class="col-3 text-end">
                     <img src="img/icone-seguro.png">
                   </div>
               </div>
           </header>
        </div>
       <div class="container-fluid checkout-container-body">
          <div class="container mt-5">
           <div class="row gx-5">
             <div class="col-7">
                <form action="">
                    <div class="bg-white p-4">
                        <h3>Dados pessoais</h3>
                        <p>Solicitamos apenas informações essenciais</p>
                        <div id="dados-pessoais">
                            <label for="nome">Nome completo
                                <input type="text" name="nome" id="nome">
                            </label>
                            <label for="nome">CPF
                                <input type="text" name="cpf" id="cpf">
                            </label>
                            <label for="nome">E-mail
                                <input type="email" name="email" id="email">
                            </label>
                            <label for="nome">Senha
                                <input type="password" name="senha" id="senha">
                            </label>
                            <label for="nome">Confirme a senha
                                <input type="password" name="confirmar-senha" id="confirmar-senha">
                            </label>
                            <button id="prosseguir-entrega">PROSSEGUIR PARA ENTREGA</button>
                        </div>
                    </div>

                    <div class="bg-white p-4 mt-5">
                        <h3>Entrega</h3>
                        <p>Solicitamos apenas informações essenciais</p>
                        <div id="entrega">
                            <label for="nome">CEP
                                <input type="text" name="cep" id="cep">
                            </label>
                            <label for="nome">Endereço
                                <input type="text" name="endereco" id="endereco">
                            </label>
                            <label for="nome">Número
                                <input type="number" name="numero" id="numero">
                            </label>
                            <label for="nome">Bairro
                                <input type="text" name="bairro" id="bairro">
                            </label>
                            <label for="nome">Cidade
                                <input type="text" name="cidade" id="cidade">
                            </label>
                            <label for="nome">Estado
                                <input type="text" name="estado" id="estado">
                            </label>
                            <button id="prosseguir-entrega">PROSSEGUIR PARA PAGAMENTO</button>
                        </div>
                    </div>

                    <div class="bg-white p-4 my-5">
                        <h3>Formas de pagamento</h3>
                        <p>Solicitamos apenas informações essenciais</p>
                        <div id="forma-de-pagamento">
                            <div>Boleto</div>
                            <button id="finalizar-pedido">FINALIZAR PEDIDO</button>
                        </div>
                    </div>
                </form>
             </div>
             <div class="col-5">
                <div class="bg-light p-4">
                    <h3>Resumo da compra</h3>
                    <table>
                        <tr>
                            <td><img src="img/product.png" alt=""><span>2x</span></td>
                            <td>
                                <p>Urso de pelúcia Stitch azul fofinho</p>
                                <p>R$ 399,99</p>
                            </td>
                            <td>R$ 799,98</td>
                        </tr>
                    </table>

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

                </div>

                <p><a href="#">Continuar comprando</a></p>
             </div>
           </div>
          </div>
       </div>
       
       
   </body>
</html>
