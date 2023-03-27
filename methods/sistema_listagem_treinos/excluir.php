<?php

include "conecxao.php";

$id = $_POST['id'];

$buscar_cadastros = "DELETE FROM tabela_de_treinos WHERE id = $id ";

$query_cadastros = mysqli_query($conx, $buscar_cadastros) or die(mysqli_error($conx));

header('location: ../../');

?>