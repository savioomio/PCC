<?php

include "cone.php";

$id = $_POST['id'];

//echo $_FILES['fileUpload'];

   	//Definindo timezone padrão
       date_default_timezone_set("Brazil/East"); 

	   //Pegando extensão do arquivo
      $ext = strtolower(substr($_FILES['fileUpload_perfil']['name'],-4)); 

      //Definindo um novo nome para o arquivo
      $novo_nome = date("Y.m.d-H.i.s") . $ext; 

      //Diretório para uploads
      $dir = '../../pages/img_perfil/'; 

      //Fazer upload do arquivo
      move_uploaded_file($_FILES['fileUpload_perfil']['tmp_name'], $dir.$novo_nome); 

      // Novo Diretório para uploads
      $dir = 'img_perfil/'; 

      $link_imagem = $dir.$novo_nome;

// echo "eco ".$link_imagem;


$buscar_cadastros = "UPDATE users SET imagem_perfil = '$link_imagem' WHERE id = $id";

$query_cadastros = mysqli_query($cone, $buscar_cadastros) or die(mysqli_error($cone));


header('location: ../../pages/perfil.page.php');

?>

