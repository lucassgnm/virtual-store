<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->title; ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="public/img/favicon-32x32.png">

    <!-- Bootstrap -->
    <link href="<?= URL; ?>public/bs/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= URL; ?>public/bs/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?= URL; ?>public/bs/css/theme.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= URL; ?>public/bs/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= URL; ?>public/bs/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js) {
            echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
        }
    }
    ?>

    <style type="text/css">
        .text-center {
            margin-top: 5%;
            margin-bottom: 5%;
        }

        .login-dark {
            background: linear-gradient(145deg, #575b5d, #252b2d);
        }

        body {
            background: url("public/img/login-bg.jpg") no-repeat center center fixed;
            font-size: 15px;
        }
    </style>

</head>


<body class="text-center">
    <div id="divCenter">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-dark" style="color: white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <!-- Aqui vai as mensagens do modal -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="offset-sm-3 offset-md-3 offset-lg-4 col-xs-4 col-sm-6 col-md-6 col-lg-4">
            <div class="login-dark p-3 shadow-lg rounded">
                <div class="pt-3">
                    <h2 class="text-white ">Faça o login</h2>
                </div>

                <form class="mt-5 form-signin" id="forlogin">
                    <div class="form-group">
                        <input type="text" name="usulogin" id="usulogin" class="form-control form-control-sm bg-light" style="font-size: 15px" placeholder="Insira seu login *">
                    </div>

                    <div class="form-group">
                        <input type="password" name="senhalogin" id="senhalogin" class="form-control form-control-sm bg-light" style="font-size: 15px" placeholder="Insira sua senha *">
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-sm btn-light col" id="btnlogar" style="font-size: 20px">
                            Login
                        </button>
                    </div>

                    <div class="text-center mt-2">
                        <a href="#" class="text-warning">Esqueceu sua senha?</a>
                    </div>

                    <div class="mt-5">
                        <p class="text-white text-center">
                            Não tem uma conta?
                            <a href="cadastro" class="text-warning">Clique aqui para registrar</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; 2020</p>


    </div>
</body>

</html>