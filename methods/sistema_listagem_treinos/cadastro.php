<?php

include "conecxao.php";

$nome_treino = $_POST['nome_treino'];
$name_user = $_POST['name_user'];
$dia_semana = $_POST['dia_semana'];
$series_repeticoes = $_POST['series_repeticoes'];
$repeticoes = $_POST['repeticoes'];

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


$buscar_cadastros = "INSERT INTO tabela_de_treinos VALUES ('', '$name_user', '$dia_semana','$nome_treino', '$series_repeticoes','$repeticoes','$link_imagem')";

$query_cadastros = mysqli_query($conx, $buscar_cadastros) or die(mysqli_error($conx));

header('location: ../../');

?>

