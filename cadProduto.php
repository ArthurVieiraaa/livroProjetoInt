<?php 
    include "include/functions.php";
    include "include/MySql.php";


    $msgErr = "";
    $titulo = "";
    $tituloErr = "";
    $ano = "";
    $anoErr = "";
    $autor = "";
    $autorErr = "";
    $valor = 0;
    $valorErr = "";
    $imagem = "";
    $imgErr = "";


    if (isset($_POST["submit"])){
        if (!empty($_FILES["image"]["name"])){
            //PEGAR INFORMAÇÕES
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            //PERMITIR SOMENTE ALGUNS FORMATOS
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif','jfif');

            if (in_array($fileType, $allowTypes)){
                $image = $_FILES['image']['tmp_name'];
                $imgContent = file_get_contents($image);

                if (isset($_POST['titulo'])){
                    $titulo = $_POST['titulo'];
                } else {
                    $titulo = "";
                };

                if (isset($_POST['ano'])){
                    $ano = $_POST['ano'];
                } else {
                    $ano = "";
                };

                if (isset($_POST['autor'])){
                    $autor = $_POST['autor'];
                } else {
                    $autor = "";
                };

                if (isset($_POST['valor'])){
                    $valor = $_POST['valor'];
                } else {
                    $valor = "";
                };

                

                //GRAVAR NO BANCO
                $sql = $pdo->prepare("INSERT INTO livros (cod_livro, titulo, ano, autor, valor, imagem) VALUES (null, ?,?,?,?,?)");
                if ($sql->execute(array($titulo, $ano, $autor, $valor, $imgContent))){
                    $msgErr = "Dados Cadastrados com suscessso";
                } else {
                    $msgErr = "Dados não cadastrados!";
                }



            } else {
                $msgErr = "Desculpe, somente jpg, png, jpeg, gif, jfif são permitidas";
            };
        } else {
            $msgErr = "Selecione uma imagem para upload";
        };
    };


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
                    
                </li>	
            </ul>
        </div>
    </nav>
    <br><br>
<form action="" method="POST">
<h1 class="">Cadastro de Produtos</h1>
<br><br>
    <fieldset class="card-cad">
        <div class="textfield">
            <input class="input-login" type="text" name="titulo" placeholder="Nome" value="<?php echo $titulo?>">
            <span class="obrigatorio">* <?php echo $tituloErr ?></span>
        </div>

        <div class="textfield">
            <input class="input-login" type="email" name="email" placeholder="Descrição" value="<?php echo $ano?>">
            <span class="obrigatorio">* <?php echo $anoErr ?></span>
        </div>

        <div class="textfield">
            <input class="input-login" type="text" name="valor" placeholder="Valor" value="<?php echo $autor?>">
            <span class="obrigatorio">* <?php echo $autorErr ?></span>
        </div>
        
        <div class="textfield">
            <input class="input-login" type="text" name="valor" placeholder="Valor" value="<?php echo $valor?>">
            <span class="obrigatorio">* <?php echo $valorErr ?></span>
        </div>
        
        <div class="textfield">
            <input class="input-login" type="file" name="imagem" placeholder="Imagem" value="<?php echo $imagem?>">
            <span class="obrigatorio">* <?php echo $imgErr ?></span>
        </div>

        <div class="row">
                <input type="submit" class="btn-cad">
                <button class="btn-cad" href="listprodutos">Produtos já cadastrados</button>
        </div>
    </fieldset>        
</form>