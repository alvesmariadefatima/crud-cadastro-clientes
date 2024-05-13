<?php
    include('lib/conexao.php');
if(isset($_POST['email']) && isset($_POST['senha'])) {

    // Definir a consulta SQL corretamente
    $email = $conexao->escape_string($_POST['email']);
    $sql_code = "SELECT * FROM clientes WHERE email = '$email'"; // Definir a consulta SQL corretamente

    // Executar a consulta SQL
    $sql_query = $conexao->query($sql_code) or die($conexao->error);

    if($sql_query->num_rows == 0) {
        echo "O e-mail informado é incorreto.";
    } else {
        $usuario = $sql_query->fetch_assoc();
        if(!password_verify($_POST['senha'], $usuario['senha'])) {
            echo "A senha informada está incorreta.";
        } else {
            $_SESSION['usuario'] = $usuario['id'];
            $_SESSION['admin'] = $usuario['admin'];
            header("Location: clientes.php");
            exit(); // Certifique-se de sair do script após redirecionar
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
</head>
<body>
    <form method="POST" action="">
        <h1>Entrar</h1>

        <p>
            <label for="">E-mail: </label>
            <input type="text" name="email">
        </p>

        <p>
            <label for="">Senha: </label>
            <input type="password" name="senha">
        </p>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>