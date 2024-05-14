<?php
/* if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header("Location: clientes.php");
    die();
} */

include('conexao.php');

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $id = intval($_POST['id']);
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $senha = $_POST['senha'];
    $alterar_senha = false;
    $sql_code_extra = "";

    if($alterar_senha) {
        $sql_code_extra = "senha = '$senha_criptografada',";
    }

    if(!empty($senha)) {
        if(strlen($senha_descriptografada) < 6 || strlen($senha) > 16) {
            echo "A senha deve ter entre 6 e 16 caracteres";
        } else {
            $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
            $sql_code_extra = "senha = '$senha_criptografada',";
        }
    }

    // Atualiza os dados do cliente no banco de dados
    $sql_update = "UPDATE clientes SET nome='$nome', telefone='$telefone', email='$email', data_nascimento='$data_nascimento' WHERE id='$id'";
    $conexao->query($sql_update) or die($conexao->error);

    // Redireciona para a página de clientes após a edição
    header("Location: clientes.php");
    exit();
}

// Se não houver submissão de formulário, obtém os dados do cliente para edição
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
    <title>ART Martins Consultoria & Marketing | Editar Cliente</title>
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./cadastrar_cliente.css">
</head>

<body>
    <form class="container-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
            <a href="https://artmartins.com.br/" target="_blank"><img class="logotipo-art-martins" src="./assets/logotipo-art-martins.png" alt="Logotipo ART Martins"></a>
        </div>

        <div class="container-link">
            <a class="link-lista" href="clientes.php">Voltar para a lista</a>
        </div>

        <h1>Editar Cliente</h1>
        <section class="section-cadastro">
            <label for="">Nome: </label>
            <input value="<?php echo $cliente['nome']; ?>" type="text" name="nome">
            <br><br>
            <label for="">Telefone: </label>
            <input value="<?php echo $cliente['telefone']; ?>" type="text" name="telefone">
            <br><br>
            <label for="">E-mail: </label>
            <input value="<?php echo $cliente['email']; ?>" type="text" name="email">
            <br><br>
            <label for="">Senha: </label>
            <input value="" type="password" name="senha">
            <br><br>
            <label for="">Data de Nascimento: </label>
            <input value="<?php echo $cliente['data_nascimento']; ?>" type="date" name="data_nascimento">
            <br><br>
            
            <!-- Adicionando campo oculto para enviar o ID do cliente -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="container-button">
                <button type="submit">Salvar Cliente</button>
            </div>
        </section>
        <br><br>
    </form>

    <div class="container-rodape">
        <footer>
            ART Martins Consultoria & Marketing - 2024&copy
        </footer>
    </div>
</body>
</html>