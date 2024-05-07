<?php
include('conexao.php');

$sql_clientes = "SELECT * FROM clientes";
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
    <p>Estes são os clientes cadastrados no seu sistema: </p>

    <div>
        <table border="1" cellpadding="10">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php if ($num_clientes == 0) { ?>
                    <tr>
                        <td colspan="6">Nenhum cliente foi cadastrado</td>
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
                            <td><?php echo $cliente['nome']; ?></td>
                            <td><?php echo $cliente['email']; ?></td>
                            <td><?php echo $telefone; ?></td>
                            <td><?php echo $data_nascimento; ?></td>
                            <td>
                                <a class="link-editar-cliente" href="editar_cliente.php?id=<?php echo $cliente['id']; ?>">Editar</a>
                                <a class="link-deletar-cliente" href="deletar_cliente.php?id=<?php echo $cliente['id']; ?>">Deletar</a>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</body>
</html>