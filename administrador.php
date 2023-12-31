<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
} else if ($_SESSION["administrador"] != 1) {
    header("Location: index.php");
}

include("config.php");

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/administrador.css">
    <title>Projeto Final - Administrador</title>
</head>

<body>
    <div>
        <div class="container-titulo">
            <h1>Página do Administrador</h1>
        </div>
        <div class="container-acoes">
            <div class="container-links">
                <a href="paginaCadastroAdmin.php">Cadastrar Novo Usuário</a>
                <a href="recados.php">Listar Recados</a>
            </div>
            <div class="container-sair">
                <a href="logout.php">Sair</a>
            </div>
        </div>
        <?php
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table class='tabela'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>Senha</th>";
            echo "<th colspan='3'>Ações</th>";
            echo "</tr>";
            while ($dados = $resultado->fetch_object()) {
                echo "<tr>";
                echo "<td>" . $dados->id . "</td>";
                echo "<td>" . $dados->nome . "</td>";
                echo "<td>" . $dados->senha . "</td>";
                echo "<td> <a class='link-editar' href=editar.php?id=" . $dados->id . ">Editar</a></td>";
                echo "<td> <a class='link-excluir' href=excluir.php?id=" . $dados->id . ">Excluir</a></td>";
                echo "<td> <a class='link-promover' href=promover.php?id=" . $dados->id . ">Promover para Administrador</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
        <a class="link-api" href="api.php">API - Temperatura</a>
    </div>
</body>

</html>