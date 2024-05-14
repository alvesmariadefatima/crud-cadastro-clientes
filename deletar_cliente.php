<?php

/* if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header("Location: clientes.php");
    die();
} */

if (isset($_POST['confirmar'])) {
    include('conexao.php');
    $id = intval($_GET['id']);
    $sql_code = "DELETE FROM clientes WHERE id = '$id'";
    $sql_query = $conexao->query($sql_code) or die($conexao->error);

    if ($sql_query) {
?>
        <h1>Cliente deletado com sucesso!</h1>
        <p><a href="clientes.php">Clique aqui</a> para a lista de clientes</a></p>
<?php
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="deletar_cliente.css">
    <title>Deletar Cliente</title>
</head>

<body>
    <div class="container-logotipo">
        <img class="logotipo-art-martins" src="./assets/logotipo-art-martins.png" alt="Logotipo ART Martins"></a>
    </div>

    <h1>Tem certeza que deseja deletar esse cliente?</h1>
    <form method="POST" action="">
        <div class="container-form">
            <a style="margin-right: 40px;" href="clientes.php">Não</a>
            <button name="confirmar" value="1" type="submit">Sim</button>
        </div>
    </form>
</body>

</html>