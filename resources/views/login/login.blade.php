<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<header>
    <ul class="nav justify-content-between align-items-center">
      <li class="nav-item"><img src="images/de-volta.png" alt="" width="23px" height="20px"> Voltar à loja</li>
      <li class="nav-item"><img src="images/fox1.svg" alt="" width="116px" height="122px"></li>
      <li class="nav-item"><img src="images/seguro.png" alt="" width="23px" height="20px">Ambiente 100% seguro</li>
    </ul>
  </header>
<hr>

<main>
        <h1>CONTA</h1>
        <div class="loginOption">
              <button class="log" id="entrarButton">ENTRAR</button>
              <button class="" id="cadastrarButton">CADASTRAR</button>
            </div>


        <section class="entrar" id="entrarSection" style="display: block;">
            <div class="salutation">
                <h2>Bem vinde de volta</h2>
                <p>iniciar sessão com seu email e senha</p>
            </div>

            <div class="formLogin">
                <form action="/" method="POST">
                    <input type="email" placeholder="E-mail">
                    <input type="password" placeholder="Senha">
                    <label>
                        <input class="checkBox" type="checkbox"> manter conectado
                    </label>
                    <button class="send sendMar">ENVIAR</button>
                </form>
            </div>
        </section>

      
        <section class="cadastrar" id="cadastrarSection" style="display: none;">
            <div class="salutation">
                <p>Crie uma conta e tenha uma experiência personalizada FOX</p>
            </div>

            <div class="formLogin">
                <form class="" action="/" method="POST">
                    <input type="email" placeholder="E-mail">
                    <input type="password" placeholder="Senha">
                    <input type="text" placeholder="Nome">
                    <input type="text" placeholder="CPF">

                    <label>
                        <input type="checkbox"> Aceito as <a href="/">Politicas de Privacidade</a> <b>FOX</b>
                    </label>
                    <button class="send sendMar">CRIAR CONTA</button>
                </form>
            </div>
        </section>
    </main>    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="js/script.js"></script>
</body>
</html>