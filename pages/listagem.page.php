<?php

session_start();

include "../methods/sistema_listagem_treinos/conecxao.php";

$buscar_cadastros = "SELECT * FROM tabela_de_treinos ORDER BY id ASC";
$query_cadastros = mysqli_query($conx, $buscar_cadastros) or die(mysqli_error($conx));

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastros de treinos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <header id="cabecalho">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <a class="navbar-brand" href="#">logo da academia</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="../">Painel Principal<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Perfil de <?php echo $_SESSION['name']; ?></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Treinos da semana</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Segunda</a>
                            <a class="dropdown-item" href="#">Terça</a>
                            <a class="dropdown-item" href="#">Quarta</a>
                            <a class="dropdown-item" href="#">Quinta</a>
                            <a class="dropdown-item" href="#">Sexta</a>
                            <a class="dropdown-item" href="#">Sábado</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>

    <div class="con">
        <table class="table">
            <?php
            while ($receber_dados = mysqli_fetch_array($query_cadastros)) {
                $id = $receber_dados['id'];
                $nome_treino = $receber_dados['nome_treino'];
                $series_repeticoes = $receber_dados['series_repeticoes'];
                $repeticoes = $receber_dados['repeticoes'];
                $link_imagem = $receber_dados['link_imagem'];
            ?>
                <tr class="">
                    <form action="../methods/sistema_listagem_treinos/editar.php" method="POST" enctype="multipart/form-data">
                        <td><img src="<?php echo $link_imagem; ?>" width="150"></td>
                        <td class=""><input type="text" name="nome_treino" value="<?php echo $nome_treino; ?>"></td>
                        <td class=""><input type="number" name="series_repeticoes" value="<?php echo $series_repeticoes; ?>"></td>
                        <td class=""><input type="number" name="repeticoes" value="<?php echo $repeticoes; ?>"></td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" value="Editar">
                        </td>
                    </form>
                    <td>
                        <form action="../methods/sistema_listagem_treinos/excluir.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>
            <?php }; ?>
            <tr>
                <form action="../methods/sistema_listagem_treinos/cadastro.php" method="POST" enctype="multipart/form-data">
                    <td></td>
                    <td><input type="text" name="nome_treino" placeholder="Nome do treino"></td>
                    <td><input type="number" name="series_repeticoes" placeholder="Número de séries"></td>
                    <td><input type="number" name="repeticoes" placeholder="Número de repetições"></td>
                    <td><input type="file" name="fileUpload" ></td>
                    <td><input type="submit" value="NOVO CADASTRO"></td>
                </form>
        </table>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSLZ7" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>