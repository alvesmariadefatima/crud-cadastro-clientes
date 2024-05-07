<?php
include('conexao.php');

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$data_nascimento = $_POST['data_nascimento'];

// Modifiquei a consulta SQL para não especificar o campo 'id', assumindo que seja autoincrementável
$sql = "INSERT INTO clientes(nome, telefone, email, data_nascimento) 
            VALUES ('$nome', '$telefone', '$email', '$data_nascimento')";

if (mysqli_query($conexao, $sql)) {
    echo "Cliente cadastrado com sucesso!!!";
} else {
    echo "Erro ao cadastrar o cliente: " . mysqli_error($conexao);
}
mysqli_close($conexao);