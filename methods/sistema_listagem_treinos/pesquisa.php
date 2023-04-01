<?php

include "conecxao.php";

if(isset($_POST['search'])){
  $search_term = $_POST['search'];
  
  // Preparando a consulta SQL
  $sql = "SELECT * FROM tabela_de_treinos WHERE name_user LIKE '%$search_term%' or dia_semana LIKE '%$search_term%'";

  // Executando a consulta SQL
  $result = mysqli_query($conx, $sql);

  // Verificando se a consulta retornou resultados
  if (mysqli_num_rows($result) > 0) {
    // Exibindo os resultados
    while($row = mysqli_fetch_assoc($result)) {
      echo "ID: " . $row["id"]. " - Nome: " . $row["name_user"]. " - Dia_da_semana: " . $row["dia_semana"]. " - Nome_do_treino: " . $row["nome_treino"]. "<br>";
    }
  } else {
    echo "Nenhum resultado encontrado";
  }
}

mysqli_close($conx);

//header('location: ../../');

?>