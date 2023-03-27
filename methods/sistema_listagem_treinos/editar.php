<?php

include "conecxao.php";

$id = $_POST['id'];
$nome_treino = $_POST['nome_treino'];
$series_repeticoes = $_POST['series_repeticoes'];
$repeticoes = $_POST['repeticoes'];

$buscar_cadastros = "UPDATE tabela_de_treinos SET nome_treino = '$nome_treino', series_repeticoes = '$series_repeticoes', repeticoes = '$repeticoes' WHERE id = $id";

$query_cadastros = mysqli_query($conx, $buscar_cadastros) or die(mysqli_error($conx));


header('location: ../../');

?>

