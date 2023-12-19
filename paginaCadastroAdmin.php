<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
} else if ($_SESSION["administrador"] != 1) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/paginaCadastro.css">
    <title>Projeto Final - Cadastro Administrador</title>
</head>

<body>
    <form class="formulario" action="cadastrarAdmin.php" method="post">
        <h1>Cadastro</h1>
        <input class="inputs" type="text" name="nome" placeholder="Nome:">
        <input class="inputs" type="password" name="senha" placeholder="Senha:">
        <input class="btn-cadastrar" type="submit" value="Cadastrar">
    </form>
</body>

</html>