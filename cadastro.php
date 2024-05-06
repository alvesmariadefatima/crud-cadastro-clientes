<?php
    include("conexao.php");

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];

    $sql = "INSERT INTO cadastro(nome, telefone, email, data_nascimento) 
    VALUES ('$nome', '$telefone', '$email', '$data_nascimento')";

    if(mysqli_query($conexao, $sql)) {
        echo "Usuário cadastrado com sucesso!!!";
    } else {
        echo "Erro".mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);
?>