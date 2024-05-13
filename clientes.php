<?php
include('lib/conexao.php');
if(!isset($_SESSION)) {
    session_start();

    if(!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        die();
    }
}

$id = $_SESSION['usuario'];

$sql_clientes = "SELECT * FROM clientes WHERE id != $id";
$query_clientes = $conexao->query($sql_clientes) or die($conexao->error);
$num_clientes = $query_clientes->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="clientes.css">
    <title>Lista de Clientes</title>
</head>

<body>
    <h1>Lista de Clientes</h1>
    <?php if(!$_SESSION['admin']) ?>
    <p>
        <a style='color: #DAA520; text-decoration: none' href="cadastrar_cliente.php">Cadastrar um Cliente</a>
    </p>
    <p>Estes são os clientes cadastrados no seu sistema: </p>

    <div>
        <table border="1" cellpadding="10">
            <thead>
                <th>ID</th>
                <th>É Admin?</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Data de Nascimento</th>
                <?php if(!$_SESSION['admin']) { ?>
                <th>Ações</th>
                <?php } ?>
            </thead>
            <tbody>
                <?php if ($num_clientes == 0) { ?>
                    <tr>
                        <td colspan="9"><?php if(!$_SESSION['admin']) echo 9; else echo 8; ?>Nenhum cliente foi cadastrado</td>
                    </tr>
                    <?php } else {
                    while ($cliente = $query_clientes->fetch_assoc()) {
                        $telefone = "Não informado";
                        if (!empty($cliente['telefone'])) {
                            $telefone = $cliente['telefone'];
                        }

                        $data_nascimento = "Não informada";
                        if (!empty($cliente['data_nascimento'])) {
                            $data_nascimento = $cliente['data_nascimento'];
                        }
                    ?>
                        <tr>
                            <td><?php echo $cliente['id']; ?></td>
                            <td><?php if($cliente['admin']) echo "SIM"; else echo "NÃO" ?></td>
                            <td><?php echo $cliente['nome']; ?></td>
                            <td><?php echo $cliente['email']; ?></td>
                            <td><?php echo $telefone; ?></td>
                            <td><?php echo $data_nascimento; ?></td>
                            <?php if(!$_SESSION['admin']) { ?>
                            <td>
                                <a class="link-editar-cliente" href="editar_cliente.php?id=<?php echo $cliente['id']; ?>">Editar</a>
                                <a class="link-deletar-cliente" href="deletar_cliente.php?id=<?php echo $cliente['id']; ?>">Deletar</a>
                            </td>
                        </tr>
                        <?php } ?>
                <?php }
                } ?>
            </tbody>
        </table>
        <p>
            <a href="logout.php">Sair do Sistema</a>
        </p>
    </div>
</body>
</html>