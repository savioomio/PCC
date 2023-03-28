<?php

include "cone.php";

$id = $_POST['id'];
$idade = $_POST['idade'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];

$buscar_cadastros = "UPDATE users SET idade = '$idade', peso = '$peso', altura = '$altura' WHERE id = $id";

$query_cadastros = mysqli_query($cone, $buscar_cadastros) or die(mysqli_error($cone));


header('location: ../../pages/perfil.page.php');

?>

