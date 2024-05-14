<?php
$servidor = "localhost";
$usuario = "programador";
$senha = "senha";
$dbname = "crud_clientes";

$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);
if (!$conexao) {
    die("Falha na conexão com o banco de dados!" . mysqli_connect_error());
}

function formatar_data($data)
{
    return implode('/', array_reverse(explode("-", $data)));
}

function formatar_telefone($telefone)
{
        $ddd = substr($telefone, 0, 2);
        $restante = substr($telefone, 2, 5); // Pegando o restante do número após o DDD
        $ddd_array = str_split($ddd); // Dividindo o DDD em um array de caracteres
        $ddd = implode('', array_slice($ddd_array, 0, 3)); // Reunindo os primeiros 3 caracteres do array
        $parte1 = substr($restante, 0, 5); // Pegando os próximos 5 dígitos após o DDD
        $parte2 = substr($restante, 5); // Pegando os dígitos restantes
        return "($ddd) $parte1-$parte2";
}
?>