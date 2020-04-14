<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->title; ?></title>
  <link rel="icon" type="image/png" sizes="32x32" href="public/img/favicon-32x32.png">

  <!-- Bootstrap -->
  <link href="<?= URL; ?>public/bs/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= URL; ?>public/bs/css/toastr.css" rel="stylesheet" type="text/css" />
  <link href="<?= URL; ?>public/font/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= URL; ?>public/font/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />

</head>
<?php Session::init(); ?>

<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <img src="public/img/logotipo.png" href="<?= URL; ?>" index class="img-fluid" alt="Responsive image" width="120px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="<?= URL; ?>index">Home <span class="sr-only">(current)</span></a>
      </div>
    </div>
    <?php if (Session::get('logado') == null)
          echo '<a class="nav-item nav-link" href="' . URL . 'login">Logar</a>';
        ?>
    <?php if (isset($_SESSION['logado'])) {
      if (Session::get('tipo') == 0) {
        echo '<div class="dropdown">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
        ' . Session::get('email') . '
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="' . URL . 'logout/logout">Sair</a>
      </div>
    </div>';
      } else if (Session::get('tipo') == 1) {
        echo '<div class="dropdown">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
        ' . Session::get('email') . '
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="' . URL . 'produto">Cadastrar produto</a>
        <a class="dropdown-item" href="' . URL . 'logout/logout">Sair</a>
      </div>
    </div>';
      }
    }
    ?>
    
  </nav>

  <!-- Container principal -->
  <div class="content">
<?php if (session::get('tipo') == 1) { ?>

  <div class="jumbotron jumbotron-fluid ">
    <div class="container">
      <h1 class="display-4">Cadastro de Produtos</h1>

    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <form id="formprod" name="formprod">
            <div class="form-group">
              <label for="exampleInputEmail1">Descrição do produto</label>
              <input type="email" class="form-control" id="descricao" name="descricao">

            </div>
            <div class="form-group">
              <label for="valor">Preço R$</label>
              <input type="text" class="form-control valor" id="valor" name="valor">

            </div>
            <div class="form-group">
              <input type="file" name="img" id="img" accept=".jpg, .png" />
            </div>
            <br>
            <div id="imgreload">
              <img id="blah" width="300" />
            </div>
            <button type="button" id="ok" style="margin-top: 38px" name="ok" class="btn btn-primary col-sm-12 col-md-12 col-lg-12">Salvar Produto</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php }
if (session::get('tipo') == 0) { ?>
  <div class="jumbotron jumbotron-fluid jtback" style="background: #212529; color: white">
    <div class="container">
      <h1 class="display-4">Jogos</h1>
      <p class="lead">Atenção: Você não tem permissão para acessar essa página, por favor faça o login como administrador.</p>
    </div>
  </div>
<?php } ?>