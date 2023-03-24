<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login2.css">
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
            <div class="cadastrar">
                <a href="register.page.php"><span>Cadastre-se</span></a>
            </div>
        </div>
        <div class="corpo">
            <div class="left-img">
                <div class="img-exer">
                    <img id="figura" src="imgs/Group 6.png" alt="">
                </div>
            </div>
            <div class="right-form">
                    <div class="global">
                        <div class="part1">
                            <h1>LOGIN</h1>
                        </div>
                        <form action="../methods/sistema_cadastro_login/login.php" method="post">
                        <div class="part2">
                            <div class="p1" id="alinhar">
                                <div class="bot">
                                    <div class="d1">
                                        <img class="figuras" src="imgs/usuario.png" alt="">
                                    </div>
                                    <div class="d2">
                                        <input type="email" name="email" class="dados" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="part2">
                            <div class="p1" id="alinhar">
                                <div class="bot">
                                    <div class="d1">
                                        <img class="figuras cadeado"  src="imgs/cadeado.png" alt=""  onclick="mostrarSenha()">
                                    </div>
                                    <div class="d2">
                                        <input type="password" name="password"  class="dados password" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
    
                            <div class="part2" id="redut2">
                                <div class="bot" id="submit">
                                    <input type="submit" value="Entrar" id="bt">
                                </div>
                            </div>
                        </form>
                    </div>
        </div>
    </div>
        <script src="../JS/quero_ver_a_senha.js"></script>
</body>
</html>