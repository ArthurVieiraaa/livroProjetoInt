<?php
    include "include/MySql.php";

    $email = $nome = $cpf = $telefone = $senha = $senhaconf = $adm = "";
    $emailErr = $nomeErr = $cpfErr = $telefoneErr = $senhaErr = $senhaconfErr = $admErr = $msgErr = "";

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cadastro'])){
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
        if($senhaconf !== $senha){
            echo 'Senha não coincide.';
        };
        if (empty($_POST['adm'])){
            $adm = "nao";
        } else {
            $adm = "sim";
        }

        //Inserir no banco de dados
          $sql = $pdo->prepare('SELECT * FROM usuario WHERE email = ?');
          if($sql->execute(array($email))){
            if($sql->rowCount() > 0){
                echo 'Email ja cadastrado';
            }else {
                $sql = $pdo->prepare("INSERT INTO usuario (cpf, nome, telefone, email, senha, adm) VALUES (?, ?, ?, ?, ?, ?)");
                if ($sql->execute(array($cpf, $nome, $telefone, $email, $senha, $adm))){
                    $msgErr = "Dados cadastrados com sucesso!";
                    header("location:index.php");
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
    <link rel="stylesheet" href="assets/javascript/global.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="shortcut icon" href="imgs/logoicon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem Vindo</title>
</head>
<body>
    <nav class="rf3siq6p3t">
        <div class="rf3siq6p3t-container">
            <div class="rf3siq6p3t-logo">
                <a href="index.php">
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
                    <a href="index.php" class="rf3siq6p3t-links active"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
                </li>	
            </ul>
        </div>
    </nav>
    <form action="" method="POST">
        <div class="main-registro">
        <div class="card-registro">
            <h1>REGISTRO</h1>
            <br>
            <div class="textofield">
                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="Nome" value="<?php echo $nome?>">
                <span class="obrigatorio">*<?php echo $nomeErr ?></span>
            </div>
            <div class="textofield">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email" value="<?php echo $email?>">
                <span class="obrigatorio">*<?php echo $emailErr ?></span>
            </div>
            <div class="textofield">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" required id="cpf" placeholder="000.000.000-00" maxlength="14" autocomplete="off" value="<?php echo $cpf?>">
                <span id='span-error-cpf'>*<?php echo $cpfErr ?></span>
            </div>
            <div class="textofield">
                <label for="telefone">Telefone</label>
                <input type="text" required id="phone" name="phone" placeholder="(00) 0 0000-0000" autocomplete="off" maxlength="15" value="<?php echo $telefone?>">
                <span id='span-error-phone'>*<?php echo $telefoneErr ?></span>
            </div>
            <div class="textofield">
                <label for="senha">Senha</label>
                <input type="password" name="senha" placeholder="Senha" value="<?php echo $senha?>">
                <span class="obrigatorio">*<?php echo $senhaErr ?></span>
            </div>
            <div class="textofield">
                <label for="senhaconf">Confirmar sua Senha</label>
                <input type="password" name="senhaconf" placeholder="Confirme sua Senha" value="<?php echo $senhaconf?>">
                <span class="obrigatorio">*<?php echo $senhaconfErr ?></span>
            </div>
            <div class="">
                <label for="adm">Administrador</label>
                <input type="checkbox" name="adm" placeholder="" value="<?php echo $adm?>">
            </div>
            <div class="row">
            <input class="btn-registro" type="submit" value="Cadastrar" name="cadastro">
            <span class="obrigatorio"><?php echo $msgErr ?></span>
        </div>
        </div>
    </form>
    

    <script src="assets/javascript/cpf.js"></script>
</body>
</html>