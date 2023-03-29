<?php
require_once('conn.php');// inclui o arquivo de conexão com o banco de dados

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); // obtém o email informado pelo usuário e valida o formato
$password = $_POST['password']; // obtém a senha informada pelo usuário

$sql = 'SELECT * FROM users WHERE email=:email AND password=:password'; // define a query SQL para buscar um usuário com o email e senha informados
$result = $conn->prepare($sql); // prepara a query SQL para execução
$result->execute(['email' => $email, 'password' => $password]); // executa a query SQL, passando o email e senha como parâmetros
$user = $result->fetch(); // armazena o resultado da query SQL em um array associativo

if (!empty($user)){ // verifica se há resultados da query SQL
    session_start(); // inicia uma sessão

    $_SESSION['id'] = $user['id']; // armazena o ID do usuário na sessão
    $_SESSION['name'] = $user['name']; // armazena o nome do usuário na sessão
    $_SESSION['email'] = $user['email']; // armazena o email do usuário na sessão
    $_SESSION['password'] = $user['password']; // armazena o email do usuário na sessão
    $_SESSION['surname'] = $user['surname']; // armazena o email do usuário na sessão
    
    header('location: ../../'); // redireciona o usuário para a página inicial
}
else{ // caso não haja resultados da query SQL
    echo '<script>alert("Aaaah bonitinho(a) rsrs. Tentando entrar mais colocou a senha ou email errado. Pode dar meia vouta e colocar tudo certinho!"); window.history.back();</script>'; // exibe uma mensagem de erro e redireciona o usuário de volta para a página de login
    exit(); // finaliza a execução do script
}
?>
