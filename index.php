<?php

session_start();

require_once('methods/sistema_cadastro_login/verification.php');

verification('pages/login.page.php');

include "methods/sistema_listagem_treinos/conecxao.php";

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
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="pages/painel.menu.php">Painel Principal<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/perfil.page.php">Perfil de <?php echo $_SESSION['name']; ?></a>
                    </li>
                    <li class="nav-item dropdown">
                        <form method="get">
                            <select name="search">
                                <option value="">Selecione um dia da semana</option>
                                <option value="Segunda">Segunda-feira</option>
                                <option value="Terça">Terça-feira</option>
                                <option value="Quarta">Quarta-feira</option>
                                <option value="Quinta">Quinta-feira</option>
                                <option value="Sexta">Sexta-feira</option>
                                <option value="Sábado">Sábado</option>
                            </select>
                            <button type="submit">Pesquisar por dia da semana</button>
                        </form>
                    </li>
                </ul>
                <form method="get">
                    <div class="form-inline my-2 my-lg-0">
                        <input class="form-control" type="search" name="search" id="pesquisar" placeholder="Pesquisar">
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </nav>
    </header>

    <div class="con">
        <table class="table">
            <?php
            if (isset($_GET['search'])) {
                $search_term = $_GET['search'];

                // Preparando a consulta SQL
                $buscar_cadastros = "SELECT * FROM tabela_de_treinos WHERE name_user LIKE '%$search_term%' or dia_semana LIKE '%$search_term%'";

                // Executando a consulta SQL
                $query_cadastros = mysqli_query($conx, $buscar_cadastros);

                // Verificando se a consulta retornou resutados
                if (mysqli_num_rows($query_cadastros) > 0) {
                    // Exibindo os resultados
                    while ($receber_dados = mysqli_fetch_array($query_cadastros)) {
                        $id = $receber_dados['id'];
                        $nome_treino = $receber_dados['nome_treino'];
                        $series_repeticoes = $receber_dados['series_repeticoes'];
                        $repeticoes = $receber_dados['repeticoes'];
                        $link_imagem = $receber_dados['link_imagem'];
            ?>

                        <tr class="">
                            <form action="methods/sistema_listagem_treinos/editar.php" method="POST" enctype="multipart/form-data">
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
                                <form action="methods/sistema_listagem_treinos/excluir.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" value="Excluir">
                                </form>
                            </td>
                        </tr>
            <?php

                    };
                } else {
                    echo "Nenhum resultado encontrado";
                }
            };

            ?>
            <tr>
                <form action="methods/sistema_listagem_treinos/cadastro.php" method="POST" enctype="multipart/form-data">
                    <td></td>
                    <td><input type="text" name="nome_treino" placeholder="Nome do treino"></td>
                    <td><input type="text" name="name_user" placeholder="Nome do Cliente"></td>
                    <td><input type="text" name="dia_semana" placeholder="Dia da Semana"></td>
                    <td><input type="number" name="series_repeticoes" placeholder="Número de séries"></td>
                    <td><input type="number" name="repeticoes" placeholder="Número de repetições"></td>
                    <td><input type="file" name="fileUpload"></td>
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