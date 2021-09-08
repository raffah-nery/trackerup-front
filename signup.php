<?php
session_start();
if (count($_POST) > 0)
{
    if ($_POST["password"] == $_POST["confirm-password"])
    {
        $curl = curl_init("https://api.trackerup.webseekers.com.br/v1/user");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $_POST);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $response = json_decode($response, true);
        curl_close($curl);
        if ($response["status"] == "success")
        {
            header("Location:login.php");
        }
        else
        {
            $ERROR = "O email informado já existe cadastrado";
        }
    }
    else
    {
        $ERROR = "As senhas devem ser idênticas";
    }
}
if (isset($_SESSION["id"]))
{
    header("Location:index.php");
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Trackerup - Avaliação Técnica - Desenvolvedor Fullstack Pleno">
  <link rel="icon" type="image/png" href="assets/brand/favicon.png" />
  <meta name="author" content="Rafael Nery">
  <title>Trackerup - Avaliação Técnica - Desenvolvedor Fullstack Pleno | Login</title>
  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }
  
  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
  </style>
  <!-- Custom styles for this template -->
  <link href="assets/css/auth.css" rel="stylesheet"> </head>

<body class="text-center">
  <main class="form-signin">
    <?php if (isset($ERROR)) { ?> <div class="alert alert-danger" role="alert"> <?php print_r($ERROR); ?> </div> <?php } ?>
    <form name="frmSignUp" method="post" action=""> <img class="mb-4" src="assets/brand/trackerup-logo.png" alt="" height="57">
      <h1 class="h3 mb-3 fw-normal">Cadastro</h1>
      <div class="form-floating">
        <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="<?php if (isset($_POST["name"])) { print_r($_POST["name"]); }?>" required oninvalid="this.setCustomValidity('Nome é obrigatório')" onchange="this.setCustomValidity('')">
        <label for="name">Nome</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control middle" id="email" name="email" placeholder="E-mail" value="<?php if (isset($_POST["email"])) { print_r($_POST["email"]); }?>" required oninvalid="this.setCustomValidity('E-mail é obrigatório')" onchange="this.setCustomValidity('')">
        <label for="email">Email</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control middle" id="password" name="password" placeholder="Senha" required oninvalid="this.setCustomValidity('Senha é obrigatória')" onchange="this.setCustomValidity('')">
        <label for="password">Senha</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirme sua senha" required oninvalid="this.setCustomValidity('Confirmação de senha é obrigatória')" onchange="this.setCustomValidity('')">
        <label for="confirm-password">Confirme sua senha</label>
      </div>
      <div class="checkbox mb-3">
        <a href="login.php">Já tenho cadastro</a>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Cadastrar</button>
      <p class="mt-5 mb-3 text-copy">&copy; Trackerup - Avaliação Técnica Desenvolvedor Fullstack Pleno 2021</p>
    </form>
  </main>
</body>

</html>