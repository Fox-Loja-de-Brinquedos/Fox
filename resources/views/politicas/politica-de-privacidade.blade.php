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
                    <h1>POLÍTICA DE PRIVACIDADE</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="mt-5 mb-5">1. Declaração de Privacidade</h3>
                <p class="mb-5">
                    Esta página informa sobre nossas políticas referentes à coleta, uso e divulgação de dados pessoais
                    quando
                    você usa nosso Serviço e os diferentes caminhos pelos quais protegemos sua privacidade.

                    Nós usamos seus dados para fornecer e melhorar o Serviço. Ao utilizar o Serviço, você concorda com a
                    coleta
                    e uso de informações de acordo com esta política.
                </p>
                <h3 class="mt-5 mb-5">2.Coleta e Uso de Informações</h3>
                <p class="mt-5 mb-5">
                    As informações pessoais que obtemos podem ser coletadas das seguintes formas:
                    Site: Informações pessoais são coletadas no momento que o usuário interage em nosso site por meio de
                    formulário de contato, para solicitação de informações, envio de elogios e agradecimento,
                    reclamações e
                    sugestões. Essas informações pessoais incluem, dentre outras, o nome, CPF, CEP, e-mail, telefone,
                    dados do
                    produto e data da compra. O usuário do nosso portal não é obrigado em hipótese alguma a fornecer
                    qualquer
                    dado pessoal para navegar nas páginas do site, de modo que qualquer informação é fornecida por livre
                    e
                    espontânea vontade. Somente é necessária à coleta de dados básicos quando o usuário desejar o
                    retorno de seu
                    contato. Todas as informações pessoais são colhidas de maneira justa e não invasiva, com o seu
                    consentimento
                    voluntário. As informações pessoais não são acessíveis a nenhuma pessoa fora da função específica
                    para a
                    qual foram coletadas.
                    Cookies: dados pessoais podem ser coletados por meio de cookies. Para mais informações, consulte
                    nossa
                    Política de Cookies.
                    Contrato: Quando o usuário adquire um de nossos produtos, coletamos os dados necessários para a
                    confecção do
                    contrato e emissão de nota fiscal. Estes dados são, entre outros, o e-mail para contato e eventual
                    envio de
                    Nota Fiscal Eletrônica, nome, CPF, CNPJ, Razão Social, Nome completo do Responsável, Telefone,
                    Endereço
                    comercial completo com CEP, Bairro, Cidade e Estado e a Inscrição Estadual quando aplicável.

                    Compartilhamento: Podemos ter acesso a dados pessoais compartilhados por nossos parceiros comerciais
                    em
                    razão do atendimento ao serviço de pós-vendas por meio de assistências técnicas e equipe de
                    promotores para
                    orçamento, execução e entrega dos pedidos de compra. Estes dados são, entre outros, nome, CPF, CEP,
                    e-mail,
                    telefone, dados do produto e data da compra.
                    Funcionários: Quanto aos dados pessoais coletados de nossos funcionários, estes são necessários para
                    que
                    seja efetuado o registro do funcionário, em atendimento à legislação trabalhista e execução do
                    contrato de
                    trabalho.
                </p>
                <h3 class="mt-5 mb-5">3. Mídias Sociais</h3>
                <p class="mt-5 mb-5">
                    A FOX se utiliza também da Mídia Social para se comunicar e interagir com seus clientes e
                    consumidores
                    por meio de websites de terceiros como, por exemplo, o Facebook, Instagram, LinkedIn e o YouTube.
                    Estes
                    websites de terceiros são uma tecnologia baseada na Internet que não é operada ou controlada pela
                    FOX.
                    Ao interagir, compartilhar ou “Curtir” a página da FOX no Facebook, ou outra mídia social, ou
                    outra
                    mídia social, você poderá revelar determinadas informações pessoais à FOX ou a terceiros.
                    Usamos os “botões sociais” para permitir que os nossos usuários compartilhem ou marquem páginas da
                    web. São
                    botões de sites terceiros de mídias sociais, e que podem registrar informações sobre suas atividades
                    na
                    internet, incluindo este site. Por favor, reveja os respectivos termos de uso e políticas de
                    privacidade
                    dessas plataformas para entender exatamente como eles usam suas informações, como optar por não
                    receber ou
                    excluir tais informações.
                    A quantidade de informações pessoais visíveis dependerá das suas próprias configurações de
                    privacidade no
                    Facebook, Twitter e demais mídias sociais.
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
                    <p>Minha conta</p>
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