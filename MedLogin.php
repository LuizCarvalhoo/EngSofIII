<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles3.css">
</head>
<body>
    <div class="fundoMed"></div>
    <div class="container">
        <h1>Login</h1>
        <form action="processar_loginMed.php" method="post">
            <label for="crm">CRM:</label>
            <input type="text" id="crm" name="crm" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <button type="submit">Entrar</button>
            <a href = "CadastroMed.php">Cadastre-se</a>
            <a href = "index.html">Sou paciente</a>
        </form>
    </div>
</body>
</html>