<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/accountDetails.css">
    <link rel="stylesheet" href="../css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<header>
    <ul class="nav justify-content-between align-items-center">
      <li class="nav-item"><a href="/profile" class="voltar-a-loja"><img src="images/de-volta.png" alt="" width="23px" height="20px"> Minha conta</a></li>
      <li class="nav-item"><img src="images/fox1.svg" alt="" width="116px" height="122px"></li>
      <li class="nav-item"><img src="images/seguro.png" alt="" width="23px" height="20px">Ambiente 100% seguro</li>
    </ul>
  </header>
<hr>

<main>



<div class="title-section">
  <h1 class="title-details">DETALHES PESSOAIS</h1>
</div>  

<section class="profile-pref">
<h2 class="title-detail">PERFIL</h2>
@if(session('nameSucess'))
        <div class="alert alert-success">
            {{ session('nameSucess') }}
        </div>
    @endif

<form class="formProfile profileForm" action="{{ route('update.name') }}" method="POST">
  @csrf
  <label for="name" class="name-label">Nome</label>
  <input  type="text" placeholder="{{ Auth::user()->USUARIO_NOME }}" name="name" id="name" required>
  <button class="btn-detail">ATUALIZAR PERFIL</button>
</form>
</section>

<section class="profile-contact">
<h2 class="title-detail">CONTATO</h2>

<div class="profile-email">
<label>E-mail</label>
<p>{{ Auth::user()->USUARIO_EMAIL }}</p>
@if ($errors->has('new_email') || session('errorPassEmail'))
        <div class="alert alert-danger">
            @if ($errors->has('new_email'))
                <ul>
                    @foreach ($errors->get('new_email') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            @if (session('errorPassEmail'))
                {{ session('errorPassEmail') }}
            @endif
        </div>
    @endif

    @if(session('successEmail'))
        <div class="alert alert-success">
            {{ session('successEmail') }}
        </div>
    @endif
</div>


<form class="formProfile " action="{{ route('update.email') }}" method="POST">
@csrf
  <input type="text" name="new_email" placeholder="Novo E-mail" required>
  <input type="password" name="password" placeholder="Senha Atual" required>
  <button class="btn-detail">ATUALIZAR ENDEREÇO DE E-MAIl</button>
</form>
</section>

<section class="profile-password">
<h2 class="title-detail">SENHA</h2>
<p class="passWarning">Todos os campos são obrigatórios</p>
@if ($errors->has('current_password') || $errors->has('new_password') || session('currentPassError'))
        <div class="alert alert-danger">
            @if ($errors->has('current_password') || $errors->has('new_password'))
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            @if(session('currentPassError'))
                {{ session('currentPassError') }}
            @endif
        </div>
    @endif

    @if(session('successPassword'))
        <div class="alert alert-success">
            {{ session('successPassword') }}
        </div>
    @endif

<form class="formProfile" action="{{ route('update.password') }}" method="POST">
  @csrf
  <input type="password" name="current_password" placeholder="Senha Atual" required>
  <input type="password" name="new_password" placeholder="Nova Senha" required>
  <button class="btn-detail">ALTERAR SENHA</button>
</form>

</section>

</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>