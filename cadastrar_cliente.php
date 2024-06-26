<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ART Martins Consultoria & Marketing | Cadastro de Clientes</title>
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./cadastrar_cliente.css">
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
            <input type="text" name="nome">
            <br><br>
            <label for="">Telefone: </label>
            <input type="text" name="telefone">
            <br><br>
            <label for="">E-mail: </label>
            <input type="text" name="email">
            <br><br>
            <label for="">Data de Nascimento: </label>
            <input type="date" name="data_nascimento">
            <br><br>
            <br><br><label for="">Senha: </label>
            <input type="password" name="senha">
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