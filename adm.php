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
            $adm = "Não";
        } else {
            $adm = "Sim";
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
        <div class="main-adm">
        <div class="card-adm">
                <h1>LOGIN</h1>
                <br>
                <form action="" method="post">
                <div class="textfield">
                    <label for="usuario">Email</label>
                    <input type="text" required name="email" placeholder="Usuário">
                    <!-- <span class="obrigatorio">* <?php echo $emailErr ?></span> -->
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" required name="senha" placeholder="Senha">
                    <!-- <span class="obrigatorio">* <?php echo $senhaErr ?></span> -->
                </div>
                <button class="btn-entrar">Entrar</button>
            </div>
    </form>
    

    <script src="assets/javascript/cpf.js"></script>
</body>
</html>