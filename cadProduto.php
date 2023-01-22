<?php
    include "include/functions.php";
    include "include/MySql.php";

    $msgErro = "";
    $titulo = $ano = $autor = "";
    $valor = 0;

    if (isset($_POST["submit"])){
        if (!empty($_FILES["imagem"]["name"])){
            //Pegar informações
            $fileName = basename($_FILES["imagem"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            //Permitir somente alguns formatos
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileType, $allowTypes)){
                $imagem = $_FILES['imagem']['tmp_name'];
                $imgContent = file_get_contents($imagem);

                if (isset($_POST['titulo'])){
                    $titulo = $_POST['titulo'];
                } else {
                    $titulo = "";
                }
                if (isset($_POST['ano'])){
                    $ano = $_POST['ano'];
                } else {
                    $ano = "";
                }
                if (isset($_POST['autor'])){
                    $autor = $_POST['autor'];
                } else {
                    $autor = "";
                }
                if (isset($_POST['valor'])){
                    $valor = $_POST['valor'];
                } else {
                    $valor = "";
                }

                //Gravar no banco
                $sql = $pdo->prepare("INSERT INTO livros (cod_livro, titulo, ano, autor, valor, imagem)
                                      VALUES (null,?,?,?,?,?)");
                if ($sql->execute(array($titulo, $ano, $autor, $valor, $imgContent))){
                    $msgErro = "Dados cadastrados com suscesso!";
                } else {
                    $msgErro = "Dados não cadastrados!";
                }

            } else {
                $msgErro = "Desculpe, mas somente arquivos JPG, JPEG, PNG e GIF são permitidos";
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
                <a href="paineladm.php">
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
                    <a href="paineladm.php" class="rf3siq6p3t-links"><i class="fa-sharp fa-solid fa-house"></i>Voltar</a>
                </li>	
            </ul>
        </div>
    </nav>
    <br><br>
<form action="" method="post" enctype="multipart/form-data">
<h1 class="">Cadastro de Produtos</h1>
<br><br>
    <fieldset class="card-cad">
        <div class="textfield">
            <input class="input-login" type="text" name="titulo" placeholder="Titulo">
            <span class="obrigatorio">*</span>
        </div>

        <div class="textfield">
            <input class="input-login" type="text" name="ano" placeholder="Ano">
            <span class="obrigatorio">*</span>
        </div>

        <div class="textfield">
            <input class="input-login" type="text" name="autor" placeholder="Autor">
            <span class="obrigatorio">*</span>
        </div>
        
        <div class="textfield">
            <input class="input-login" type="text" name="valor" placeholder="Valor">
            <span class="obrigatorio">*</span>
        </div>
        
        <div class="textfield">
            <input class="input-login" type="file" name="imagem" placeholder="Imagem">
            <span class="obrigatorio">*</span>
        </div>

        <div class="row">
                <input type="submit" class="btn-cad" value="Cadastrar" name="submit">
                <button class="btn-cad" href="#">Produtos já cadastrados</button>
        </div>
    </fieldset>        
</form>