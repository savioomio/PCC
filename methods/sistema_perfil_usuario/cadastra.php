<?php
/*
include "cone.php";

$idade = $_POST['idade'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];

//echo $_FILES['fileUpload'];

   	//Definindo timezone padrão
      date_default_timezone_set("Brazil/East"); 

	   //Pegando extensão do arquivo
      $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); 

      //Definindo um novo nome para o arquivo
      $novo_nome = date("Y.m.d-H.i.s") . $ext; 

      //Diretório para uploads
      $dir = '../../pages/img_treinos/'; 

      //Fazer upload do arquivo
      move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$novo_nome); 

      // Novo Diretório para uploads
      $dir = 'pages/img_treinos/'; 

      $link_imagem = $dir.$novo_nome;

   // echo "eco ".$link_imagem;

$buscar_cadastros = "INSERT INTO users VALUES ('','$idade','$peso','$altura','$link_imagem')";

$query_cadastros = mysqli_query($cone, $buscar_cadastros) or die(mysqli_error($cone));

header('location: ../../pages/perfil.page.php');

*/
?>

