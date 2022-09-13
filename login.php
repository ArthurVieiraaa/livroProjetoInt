<?php
    include "../include/MySql.php";
    include "../include/functions.php";

    session_start();
    $_SESSION['nome'] = "";
    $_SESSION['adminitrador'] = ""; 

    $email = $senha = "";
    $emailErr = $senhaErr = "";


    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if (empty($_POST['email'])){
            $emailErr = "Email é obrigatório!";
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST['senha'])){
            $senhaErr = "Senha é obrigatória!";
        } else {
            $senha = test_input($_POST['senha']);
        }

        // Codigo para consultar os dados no Banco de Dados
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sql = $pdo->prepare("SELECT * FROM usuario 
                              WHERE email = ? AND senha = ?");
        if($sql->execute(array($email,md5($senha)))){
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            if (count($info) > 0) {
                foreach($info as $key => $values){
                    $_SESSION['nome'] = $values['nome'];
                    $_SESSION['administrador'] = $values['administrador'];

                }
                header('location:principal.php');
            } else {
                echo '<h6>Email de usuario não cadastrado</h6>';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="shortcut icon" href="imgs/logoicon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem Vindo</title>
</head>
<body>
    <nav class="rf3siq6p3t">
        <div class="rf3siq6p3t-container">
            <div class="rf3siq6p3t-logo">
                <a href="login.html">
                    <h3>Book's <i class="fa-solid fa-book-bookmark"></i></h3>
                </a>
            </div>
            <div class="rf3siq6p3t-toggle" id="ui5r6qlhla">
                <span class="u0hpid7tli"></span>
                <span class="u0hpid7tli"></span>
                <span class="u0hpid7tli"></span>
            </div>
            <ul class="rf3siq6p3t-menu">
                <li class="rf3siq6p3t-item">
                    <a href="registro.html" class="rf3siq6p3t-links active"><i class="fa-solid fa-user-plus"></i>Registre-se</a>
                </li>	
            </ul>
        </div>
    </nav>
    <div class="main-login">
        <div class="left-login">
            <h1 >Bem Vindo a nossa <a class="btn-visita" href="sobre.html">Biblioteca Virtual</a><br><br>Faça uma <a href="index.html"  class="btn-visita">Visita</a> ou faça o registro</h1>
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                <div class="textfield">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="text" name="senha" placeholder="Senha">
                </div>
                <button class="btn-login">Login</button>
            </div>
        </div>
    </div>
</body>
</html>