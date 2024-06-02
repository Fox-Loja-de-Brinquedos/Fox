<!DOCTYPE html>
<html>

<head>
    <title>Finalizar compra - Pagamento</title>
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
                            <a href="{{ route('carrinho.listar') }}">
                                <div class="step-circle mx-auto">1</div>
                                <span class="step-label mt-1 d-block">Carrinho</span>
                            </a>
                        </div>
                        <div class="step-item done text-center">
                            <a href="{{ route('checkout.dadospessoais') }}">
                                <div class="step-circle mx-auto">2</div>
                                <span class="step-label mt-1 d-block">Dados pessoais</span>
                            </a>
                        </div>
                        <div class="step-item done text-center">
                            <a href="{{ route('checkout.entrega') }}">
                                <div class="step-circle mx-auto">3</div>
                                <span class="step-label mt-1 d-block">Entrega</span>
                            </a>
                        </div>
                        <div class="step-item selected text-center">
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
            <div class="row gx-5">
                <div class="col-7">
                    <form action="{{ route('pedido.finalizar') }}" method="POST">
                        <input type="hidden" name="ENDERECO_ID" value="{{ $endereco->ENDERECO_ID }}">
                        @csrf
                        <div class="bg-white p-4 container-box">
                            <h3>Formas de pagamento</h3>
                            <p>Escolha o método de pagamento de sua preferência.</p>
                            <div id="forma-de-pagamento">
                                <div class="mb-3 forma-de-pagamento-box">
                                    <div class="p-3">
                                        <label for="boleto" class="opcao-pagamento"><input type="radio" name="boleto" id="boleto" checked><span class="d-inline-block ms-2">Boleto</span></label>
                                    </div>
                                    <div class="p-3 border-top">
                                        <p class="text-secondary">O Boleto bancário será exibido após a confirmação da compra e poderá ser pago em qualquer agência bancária, pelo seu smartphone ou computador através de serviços digitais de bancos.</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a class="btn mx-auto d-block" href="{{ route('checkout.entrega') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                            </svg> Voltar ao passo anterior</a>
                                    <button class="pedido-btn mx-auto d-block" type="submit">Finalizar Pedido</button>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-5">
                    <div class="bg-white pt-4 pb-1 container-box">
                        <h3 class="px-4">Resumo da compra</h3>
                        <table class="table">
                            @php
                                $subtotal = 0;
                            @endphp

                            @foreach($itens as $item)

                            @php
                                $subtotalProduto = $item->ITEM_QTD * ($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO);
                                $subtotal += $subtotalProduto;
                            @endphp
                            <tr>
                                <td class="ps-4 position-relative">
                                    @if($item->produto->imagens->isNotEmpty())
                                    <img src="{{ $item->produto->imagens->first()->IMAGEM_URL }}" alt="{{ $item->produto->PRODUTO_NOME }}" style="max-width: 80px; max-height: 80px; object-fit: contain;">
                                    @else
                                    <img src="https://multilit.com.br/wp-content/uploads/2020/03/Produto-sem-foto.png" alt="Produto sem imagem" style="max-width: 80px; max-height: 80px; object-fit: contain;">
                                    @endif
                                    <span class="d-block position-absolute top-0 end-0 checkout-item-qtd mt-2">{{ $item->ITEM_QTD }}x</span>
                                </td>
                                <td>
                                    <p class="text-secondary mb-0">{{ $item->produto->PRODUTO_NOME }}</p>
                                    <p class="text-secondary mb-0 cart-table-total">R$ {{ number_format($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO, 2, ',', '.') }}</p>
                                </td>
                                <td class="pe-4 text-secondary text-nowrap">R$ {{ number_format($subtotalProduto, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </table>

                        <table class="table resumo-table">
                            <tr>
                                <td class="ps-4 text-secondary fs-5">Subtotal:</td>
                                <td class="pe-4 text-secondary fs-5 text-end ">R$ {{ number_format($subtotal, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="ps-4 text-secondary fs-5">Frete:</td>
                                <td class="pe-4 text-secondary fs-5 text-end">R$ 10,00</td>
                            </tr>
                            <tr>
                                <td class="ps-4 cart-table-total fs-5 border-0">Total:</td>
                                <td class="pe-4 cart-table-total fs-5 text-end border-0">R$ {{ number_format($subtotal + 10, 2, ',', '.') }}</td>
                            </tr>
                        </table>

                    </div>

                    <p class="text-center mt-3"><a class="btn-back-to-store" href="/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                            </svg> Continuar comprando</a></p>
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showStep(1);
        });

        function showStep(step) {
            const steps = document.querySelectorAll('.step');
            steps.forEach((stepElement, index) => {
                stepElement.classList.remove('active');
                if (index + 1 === step) {
                    stepElement.classList.add('active');
                }
            });
        }

        function nextStep(step) {
            showStep(step);
        }

        function prevStep(step) {
            showStep(step);
        }

    </script>

</body>

</html>