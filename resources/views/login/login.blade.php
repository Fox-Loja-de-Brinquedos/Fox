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
      <li class="nav-item"><a href="/" class="voltar-a-loja"><img src="images/de-volta.png" alt="" width="23px" height="20px"> Voltar à loja</a></li>
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
            <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <input type="email" name="USUARIO_EMAIL" placeholder="E-mail" required>
                    <input type="password" name="USUARIO_SENHA" placeholder="Senha" required>
                    
                    <label>
                        <input class="checkBox" type="checkbox" name="remember"> manter conectado
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
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Campo USUARIO_EMAIL -->
            <input type="email" name="USUARIO_EMAIL" placeholder="E-mail" value="{{ old('USUARIO_EMAIL') }}" required>
            @error('USUARIO_EMAIL')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Campo USUARIO_SENHA -->
            <input type="password" name="USUARIO_SENHA" placeholder="Senha" required>
            @error('USUARIO_SENHA')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Campo USUARIO_NOME -->
            <input type="text" name="USUARIO_NOME" placeholder="Nome" value="{{ old('USUARIO_NOME') }}" required>
            @error('USUARIO_NOME')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Campo USUARIO_CPF -->
            <input type="text" name="USUARIO_CPF" id="USUARIO_CPF" placeholder="CPF" value="{{ old('USUARIO_CPF') }}" required>
            @error('USUARIO_CPF')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Aceitar Política de Privacidade -->
            <label>
                <input type="checkbox" required> Aceito as <a href="/">Políticas de Privacidade</a> <b>FOX</b>
            </label>

            <!-- Exibição de erro geral -->
            @if ($errors->has('error'))
                <div class="alert alert-danger">{{ $errors->first('error') }}</div>
            @endif

            <button class="send sendMar">CRIAR CONTA</button>
        </form>
    </div>
</section>
    </main>   
    
   
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="js/login.js"></script>
</body>
</html>