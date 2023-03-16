<?php
include "include/MySql.php";
include "include/functions.php";

$titulo = $ano = $autor = $valor = "";
$tituloErr = $anoErr = $autorErr = $valorErr = $msgErr = "";


if (isset($_GET['cod_livro'])) {
    $cod_livro = $_GET['cod_livro'];
    $sql = $pdo->prepare('SELECT * FROM livros WHERE cod_livro = ?');
    if ($sql->execute(array($cod_livro))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $cod_livro = $value['cod_livro'];
            $titulo = $value['titulo'];
            $ano = $value['ano'];
            $autor = $value['autor'];
            $valor = $value['valor'];
        }
        ;
    }
    ;
}
;


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cadastro'])) {
    if (isset($_POST['cod_livro'])) {
        $cod_livro = $_POST['cod_livro'];
    }

    if (empty($_POST['ano'])) {
        $anoErr = "ano é obrigatório!";
    } else {
        $ano = test_input($_POST["ano"]);
    }
    if (empty($_POST['valor'])) {
        $valorErr = "valor é obrigatório!";
    } else {
        $valor = test_input($_POST["valor"]);
    }
    if (empty($_POST['titulo'])) {
        $tituloErr = "titulo é obrigatório!";
    } else {
        $titulo = test_input($_POST["titulo"]);
    }
    if (empty($_POST['autor'])) {
        $autorErr = "autor é obrigatório!";
    } else {
        $autor = test_input($_POST["autor"]);
    }

    if ($ano && $titulo && $valor && $autor) {
        $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE ano = ? AND cod_livro <> ?");
        if ($sql->execute(array($ano, $cod_livro))) {
            if ($sql->rowCount() > 0) {
                $msgErr = "ano ja cadastrado para outro usuario.";
            } else {
                $sql = $pdo->prepare("UPDATE usuario SET titulo=?, 
                                                            ano=?,
                                                            valor=?, 
                                                            autor=?, WHERE cod_livro=?");
                if ($sql->execute(array($titulo, $ano, $valor, $autor, $cod_livro))) {
                    $msgErr = "dados alterados com sucesso!";
                } else {
                    $msgErr = "dados não alterados";
                }
            }
        }
    } else {
        $msgErr = "Dados não cadastrados!";
    }
    ;
}
;
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
        </div>
    </nav>

    <form action="" method="POST">

        <h1 class="titulo-txt">Alterações do usuario</h1>
        <fieldset class="card-cad">
            <div>
                <label class="cod_livro" for="cod_livro">
                    <p> cod_livro:
                        <?php echo $cod_livro ?>
                    </p>
                </label>
                <br>
            </div>

            <div class="textfield">
                <label for="titulo">
                    <p class="txt-alt"> Titulo: </p>
                </label>
                <input class="input-login" type="text" name="text" value="<?php echo $titulo ?>">
                <span class="obrigatorio">*
            </div>

            <div class="textfield">
                <label for="Ano">
                    <p class="txt-alt"> Ano: </p>
                </label>
                <input class="input-login" type="text" name="Ano" value="<?php echo $Ano ?>">
                <span class="obrigatorio">*
            </div>

            <div class="textfield">
                <label for="Autor">
                    <p class="txt-alt"> Autor: </p>
                </label>
                <input class="input-login" type="text" name="Autor" value="<?php echo $Autor ?>">
                <span class="obrigatorio">*
            </div>

            <div class="textfield">
                <label for="valor">
                    <p class="txt-alt"> Valor: </p>
                </label>
                <input class="input-login" type="text" name="valor" value="<?php echo $valor ?>">
                <span class="obrigatorio">*
            </div>
            <br>
            <div>
                <input class="button-form" type="submit" value="Salvar" name="alter">
                <span class="obrigatorio">*
            </div>
        </fieldset>
    </form>

</body>

</html>