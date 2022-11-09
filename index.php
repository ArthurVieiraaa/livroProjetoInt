<?php
    include "include/MySql.php";
    include "include/functions.php";

    session_start();

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $emailLogin = $_POST['email'];
        $passwordLogin = $_POST['senha'];

        if( isset($_POST['email']) && isset($_POST['senha']) ){
                
            if( empty($emailLogin) && empty($passwordLogin) ){
                echo 'Insira corretamente as informações: CPF, SENHA.';
            }else{
                $query = $pdo->prepare('SELECT * FROM usuario WHERE `email` = ? AND `senha` = ?');

                if($query->execute(array($emailLogin, $passwordLogin))){

                    $row = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach($row as $k){
                        $email = $k['email'];
                        $name = $k['nome'];
                    };

                    if(count($row) > 0){
                        $_SESSION['email'] = $email;
                        $_SESSION['name'] = $nome;
                        $_SESSION['logged'] = true;
                        header('Location: biblioteca.php');
                    }else{
                        unset($_SESSION['name']);
                        unset($_SESSION['logged']);
                        unset($_SESSION['email']);
                        echo 'CPF ou Senha incorretos.';
                    };

                };

            };

        }else{
            echo 'Insira todas as informações.';
            exit();
        };

    };

    // $_SESSION['logged'] = ($_SESSION['logged'] ?? NULL);

    // if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //     if (empty($_POST['email'])){
    //         $emailErr = "Email é obrigatório!";
    //     } else {
    //         $email = test_input($_POST["email"]);
    //     }

    //     if (empty($_POST['senha'])){
    //         $senhaErr = "Senha é obrigatória!";
    //     } else {
    //         $senha = test_input($_POST['senha']);
    //     }

        // Codigo para consultar os dados no Banco de Dados
    // $email = $_POST['email'];
    // $senha = $_POST['senha'];

    // $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = ? AND senha = ?");

    // if($sql->execute(array($email, md5($senha)))){
    //     $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    //     if (!count($info) > 0) {
    //         $_SESSION['logged'] = true;
    //         header('location: biblioteca.php');
    //         exit();
    //     } else {
    //         unset($_SESSION['logged']);
    //         echo '<h6>Email de usuario não cadastrado</h6>';
    //         exit();
    //     };
    // };

    // }

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
                    <a href="registro.php" class="rf3siq6p3t-links active"><i class="fa-solid fa-user-plus"></i>Registre-se</a>
                </li>	
            </ul>
        </div>
    </nav>
    <div class="main-login">
        <div class="left-login">
            <h1 >Bem Vindo a nossa <a class="btn-visita" href="sobre.html">Biblioteca Virtual</a><br><br>Faça uma <a href="visitabbt.php"  class="btn-visita">Visita</a> ou faça o registro</h1>
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>LOGIN</h1>
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
                <button class="btn-login">Login</button>
            </div>
                </form>
        </div>
    </div>
</body>
</html>