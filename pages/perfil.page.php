<?php

session_start();

require_once('../methods/sistema_cadastro_login/verification.php');

verification('pages/login.page.php');

include "../methods/sistema_perfil_usuario/cone.php";

$buscar_cadastros = "SELECT * FROM users WHERE `id` = {$_SESSION['id']}";
$query_cadastros = mysqli_query($cone, $buscar_cadastros) or die(mysqli_error($cone));


?>
<!doctype html>
<html lang="en">

<head>
    <title>Perfil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        #corpo {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            width: 100%;
        }

        .card {
            width: 60%;
            height: 70vh;
            border-radius: 44px;
            background-color: #0004;
            box-shadow: 2px 3px 20px 1px #0004,
                2px 3px 20px 1px #0004;
        }

        .avatar {
            width: 30vh;
            height: 30vh;
            background-color: rgba(255, 255, 255, 0.9);
            margin: 30px 15px 20px 25px;
            border-radius: 50%;
            overflow: hidden;
        }

        .img_perfil {
            width: 30vh;
            height: 30vh;
            object-fit: cover;
        }

        .boas_vindas {
            display: flex;
            flex-direction: row;
        }

        .caixa_dados {
            margin-left: 5vh;
            margin-top: 5vh;
            display: flex;
            flex-direction: column;
        }

        .dados_usuario {
            color: #977653;
        }

        .dados_usuario_input {
            color: #977653;
            background-color: transparent;
            border-style: none;
        }
    </style>
</head>

<body>
    <header id="cabecalho">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <a class="navbar-brand" href="#">logo da academia</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="painel.menu.php">Painel Principal<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../">Lista de treinos<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>

    <main id="corpo">
        <?php
        while ($receber_dados = mysqli_fetch_array($query_cadastros)) {
            $id = $receber_dados['id'];
            $idade = $receber_dados['idade'];
            $peso = $receber_dados['peso'];
            $altura = $receber_dados['altura'];
            $imagem_perfil = $receber_dados['imagem_perfil'];
        ?>
            <div class="card">
                <div class="boas_vindas">
                    <label class="avatar">
                        <img class="img_perfil" src="<?php echo $imagem_perfil; ?>">
                    </label>
                    <div class="caixa_dados">
                        <p> Este e seu nome: <span class="dados_usuario"><?php echo $_SESSION['name']; ?></span> </p>

                        <p> Esse e seu sobrenome: <span class="dados_usuario"><?php echo $_SESSION['surname']; ?></span> </p>

                        <p> O seu email e esse: <span class="dados_usuario"><?php echo $_SESSION['email']; ?></span> </p>

                        <p> Essa e sua senha: <input type="password" class="dados_usuario_input" value="<?php echo $_SESSION['password']; ?>"></input> </p>
                    </div>
                </div>

                <table class="table">
                    <tr class="">
                        <td class=""><strong>Qual é sua idade?</strong></td>
                        <td class=""><strong>Qual é o seu peso?</strong></td>
                        <td class=""><strong>Qual é sua altura em centimentros?</strong></td>
                        <td></td>
                    </tr>


                    <tr class="">
                        <form action="../methods/sistema_perfil_usuario/salvar.php" method="POST">
                            <td class=""><input type="number" name="idade" placeholder="Qual é  sua idade?" value="<?php echo $idade; ?>"></td>
                            <td class=""><input type="number" name="peso" placeholder="Qual é o seu peso?" value="<?php echo $peso; ?>"></td>
                            <td class=""><input type="number" name="altura" placeholder="Qual é sua altura?" value="<?php echo $altura; ?>"></td>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" value="Editar">
                            </td>
                        </form>
                    </tr>
                <?php  }; ?>                
            </table>
                    <form action="../methods/sistema_perfil_usuario/salvar_perfil.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="file" name="fileUpload_perfil">
                        <input type="submit" value="ADICIONAR FOTO DE PERFIL">
                    </form>

            </div>


            </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>