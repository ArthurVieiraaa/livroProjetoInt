<?php
    include "../include/MySql.php";

    $usuario = $email = $nome = $cpf = $telefone = $senha = $senhaconf = $adm = "";
    $usuarioErr = $emailErr = $nomeErr = $cpfErr = $senhaErr = $senhaconfErr = $admErr = $msgErr = "";

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cadastro'])){
        if (empty($_POST['usuario'])){
            $usuarioErr = "Usuário é obrigatório!";
        } else {
            $usuario = test_input($_POST["usuario"]);
        }
        if (empty($_POST['email'])){
            $emailErr = "Email é obrigatório!";
        } else {
            $email = test_input($_POST["email"]);
        }
        if (empty($_POST['nome'])){
            $nomeErr = "Nome é obrigatório!";
        } else {
            $nome = test_input($_POST["nome"]);
        }
        if (empty($_POST['cpf'])){
            $cpfErr = "CPF é obrigatório!";
        } else {
            $cpf = test_input($_POST["cpf"]);
        }
        if (empty($_POST['telefone'])){
            $telefoneErr = "Telefone é obrigatório!";
        } else {
            $telefone = test_input($_POST["telefone"]);
        }
        if (empty($_POST['senha'])){
            $senhaErr = "Senha é obrigatório!";
        } else {
            $senha = test_input($_POST["senha"]);
        }
        if (empty($_POST['senhaconf'])){
            $senhaconfErr = "Confirmar sua Senha é obrigatório!";
        } else {
            $senhaconf = test_input($_POST["senhaconf"]);
        }
        if (empty($_POST['adm'])){
            $adm = false;
        } else {
            $adm = true;
        }

        //Inserir no banco de dados
          $sql = $pdo->prepare('SELECT * FROM usuario WHERE email = ?');
          if($sql->execute(array($email))){
            if($sql->rowCount() > 0){
                echo 'Email ja cadastrado';
            }else {
                $sql = $pdo->prepare("INSERT INTO USUARIO (codigo, usuario, email, nome, cpf, telefone, senha, senhaconf, adm)
                                    VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?,)");
                if ($sql->execute(array($usuario, $email, $nome, $cpf, $telefone, $senha, $senhaconf, $adm))){
                $msgErr = "Dados cadastrados com sucesso!";
                header("location: login.php");  
                } else {
                $msgErr = "Dados não cadastrados!";
                };
            };
          };                    

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
                    <a href="login.html" class="rf3siq6p3t-links active"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
                </li>	
            </ul>
        </div>
    </nav>
    <div class="main-registro">
        <div class="card-registro">
            <h1>REGISTRO</h1>
            <div class="textofield">
                <label for="usuario">Usuário</label>
                <input type="text" name="usuario" placeholder="Usuário">
            </div>
            <div class="textofield">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email">
            </div>
            <div class="textofield">
                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="Nome">
            </div>
            <div class="textofield">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" placeholder="CPF">
            </div>
            <div class="textofield">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" placeholder="Telefone">
            </div>
            <div class="textofield">
                <label for="senha">Senha</label>
                <input type="password" name="senha" placeholder="Senha">
            </div>
            <div class="textofield">
                <label for="senhaconf">Confirmar sua Senha</label>
                <input type="password" name="senhaconf" placeholder="Confirme sua Senha">
            </div>
            <div class="textofield">
                <label for="adm">Administrador</label>
                <input type="checkbox" name="adm" placeholder="">
            </div>
            <button class="btn-registro">Efetuar Registro</button>
        </div>
    </div>
</body>
</html>