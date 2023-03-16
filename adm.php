<?php
include "include/MySql.php";
include "include/functions.php";
session_start();

if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) {

} else {

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];


    if ($email === 'admin' && $senha === 'admin123') {
        $_SESSION['is_admin'] = true;
        header('Location: paineladm.php');
        exit();
    } else {
        $error_message = 'Usuário ou senha incorretos';
    }
}


// include "include/MySql.php";
// include "include/functions.php";
// session_start();
// if ($_SERVER['REQUEST_METHOD'] == "POST"){
//     $emailLogin = $_POST['email'];
//     $passwordLogin = $_POST['senha'];
//     if( isset($_POST['email']) && isset($_POST['senha']) ){

//         if( empty($emailLogin) && empty($passwordLogin) ){
//             echo 'Insira corretamente as informações: Email, SENHA.';
//         }else{
//             $query = $pdo->prepare('SELECT * FROM usuario WHERE `email` = ? AND `senha` = ?');
//             if($query->execute(array($emailLogin, $passwordLogin))){
//                 $row = $query->fetchAll(PDO::FETCH_ASSOC);
//                 foreach($row as $k){
//                     $email = $k['email'];
//                     $name = $k['nome'];
//                 };
//                 if(count($row) > 0){
//                     $_SESSION['email'] = $email;
//                     $_SESSION['name'] = $nome;
//                     $_SESSION['logged'] = true;
//                     header('Location: biblioteca.php');
//                 }else{
//                     unset($_SESSION['name']);
//                     unset($_SESSION['logged']);
//                     unset($_SESSION['email']);
//                     echo 'Email ou Senha incorretos.';
//                 };
//             };
//         };
//     }else{
//         echo 'Insira todas as informações.';
//         exit();
//     };
// };
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
                    <a href="index.php" class="rf3siq6p3t-links active"><i
                            class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <form action="" method="POST">
        <div class="main-adm">
            <div class="card-adm">
                <h1>ADMINISTRAÇÃO</h1>
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