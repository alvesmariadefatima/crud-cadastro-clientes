<?php
include('conexao.php');
$id = intval($_GET['id']);
$sql_cliente = "SELECT * FROM clientes WHERE id = '$id'";
$query_cliente = $conexao->query($sql_cliente) or die($conexao->error);
$cliente = $query_cliente->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ART Martins Consultoria & Marketing | Cadastro de Clientes</title>
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./cadastro.css">
</head>

<body>
    <form class="container-form" action="cadastro.php" method="POST">
        <div>
            <a href="https://artmartins.com.br/" target="_blank"><img class="logotipo-art-martins" src="./assets/logotipo-art-martins.png" alt="Logotipo ART Martins"></a>
        </div>

        <div class="container-link">
            <a class="link-lista" href="clientes.php">Voltar para a lista</a>
        </div>

        <h1>Formulário de Cadastro de Clientes</h1>
        <section class="section-cadastro">
            <label for="">Nome: </label>
            <input value="<?php echo $cliente['nome']; ?>" type="text" name="nome">
            <br><br>
            <label for="">Telefone: </label>
            <input value="<?php if (!empty($cliente['telefone'])) echo $cliente['telefone']; ?>" type="text" name="telefone">
            <br><br>
            <label for="">E-mail: </label>
            <input value="<?php echo $cliente['email']; ?>" type="text" name="email">
            <br><br>
            <label for="">Data de Nascimento: </label>
            <input value="<?php if (!empty($cliente['data_nascimento'])) echo $cliente['data_nascimento']; ?>" type="date" name="data_nascimento">
            <br><br>

            <div class="container-button">
                <button onclick="validarDados(event)">Cadastrar</button>
            </div>
        </section>
        <br><br>
    </form>

    <div class="container-rodape">
        <footer>
            ART Martins Consultoria & Marketing - 2024&copy
        </footer>
    </div>

    <script>
        function validarDados(event) {
            // Obtenha os valores dos campos do formulário
            var nome = document.getElementsByName("nome")[0].value;
            var telefone = document.getElementsByName("telefone")[0].value;
            var email = document.getElementsByName("email")[0].value;
            var dataNascimento = document.getElementsByName("data_nascimento")[0].value;

            // Verifique se algum campo está vazio
            if (nome === "" || telefone === "" || email === "" || dataNascimento === "") {
                // Se algum campo estiver vazio, exiba uma mensagem de alerta
                alert("Por favor, preencha todos os campos do formulário.");
                event.preventDefault(); // Impede o envio do formulário
            }
        }
    </script>
</body>
</html>