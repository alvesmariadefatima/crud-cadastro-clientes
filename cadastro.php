<?php
if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header("Location: clientes.php");
    die();
}

include('lib/conexao.php');
include('lib/mail.php');

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$data_nascimento = $_POST['data_nascimento'];
$senha_descriptografada = $_POST['senha'];
$admin = $_POST['admin'];

if(strlen($senha_descriptografada) < 6 || strlen($senha_descriptografada) > 16) {
    echo "A senha deve ter entre 6 e 16 caracteres";
} else {

    // Criptografar a senha
    $senha = password_hash($senha_descriptografada, PASSWORD_DEFAULT);

    // Inserir dados no banco de dados
    if($path) {
        $sql = "INSERT INTO clientes(nome, telefone, email, senha, data_nascimento, admin) 
                VALUES ('$nome', '$telefone', '$email', '$senha', '$data_nascimento', '$path', '$admin')";
    } else {
        $sql = "INSERT INTO clientes(nome, telefone, email, senha, data_nascimento) 
                VALUES ('$nome', '$telefone', '$email', '$senha', '$data_nascimento')";
    }

    if (mysqli_query($conexao, $sql)) {
        enviar_email($email, "Conta criada com sucesso!!!", "
        <h1>Parabéns!</h1>
        <p>Sua conta no Formulário de cadastro para Clientes da ART Martins foi criada com sucesso!!!</p>
        <p>
            <b>Login: </b>$email<br>
            <b>Senha: </b>$senha_descriptografada<br>
        </p>
    
        <p>
            <p>Para fazer login, acesse este <a href='cadastrar_cliente.php'>link</a> aqui.</p>
        </p>
    ");
        echo "Cliente cadastrado com sucesso!!!";
    } else {
        echo "Erro ao cadastrar o cliente: " . mysqli_error($conexao);
    }
}

mysqli_close($conexao);
?>