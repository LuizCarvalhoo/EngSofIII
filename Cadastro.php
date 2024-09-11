<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fundo"></div>
    <div class="container">
        <h1>Cadastro</h1>
        <hr>
        <form action="selecionar_medico.php" method="post">
            <label for="text">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="data">Data de Nascimento:</label>
            <input type="date" id="data" name="data" required>
            <label for="data">Telefone:</label>
            <input type="telefone" id="telefone" name="telefone" required>
            <label for="data">Cidade:</label>
            <input type="Cidade" id="telefone" name="telefone" required>
            <label for="data">Estado:</label>
            <input type="Estado" id="telefone" name="telefone" required>
            <hr>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="nome">CPF:</label>
            <input type="cpf" id="cpf" name="cpf" required>
            <label for="nome">CNS:</label>
            <input type="text" id="cns" name="cns" required>
            <hr>
            <label for="senha">Senha:</label>
            <input id="senha" name="senha" required>
            <label for="senha">Repita sua Senha:</label>
            <input id="senhaR" name="senhaR" required>
            <hr>
            <br><button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>

