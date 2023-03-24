<?php

session_start();

require_once('methods/sistema_cadastro_login/verification.php');

verification('pages/login.page.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de administrativo</title>
    <link rel="stylesheet" href="css/adm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Lobster&family=Rajdhani:wght@300&family=Righteous&family=Sigmar+One&family=Sofia+Sans+Semi+Condensed:wght@100&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main">
        <div class="paraAlogo">
            <div class="logo">
                <p>JS</p>
                <p id="outraFont">Academy</p>
            </div>
        </div>
        <div class="corpo">
            <div class="left-img">
                <div class="img-exer">
                    <img id="figura" src="pages/imgs/Group 6.png" alt="">
                </div>
            </div>
            <div class="right-form">
                <div class="global">
                    <div class="box">
                        <div class="form-box">
                            <h2>Painel de acesso</h2>
                            <br>
                            <p> Bem vindo, <span><?php echo $_SESSION['name']; ?></span> </p>
                            <span></span>
                            <div class="input-group">
                                <a href="methods/sistema_cadastro_login/logout.php"><button class="sair">Sair</button></a>
                                <a href="pages/listagem.page.php"><button class="sair">Ver listar de treinos</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>