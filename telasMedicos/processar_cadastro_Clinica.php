<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles3.css">
</head>

<body>

</body>
<div class="fundoMed"></div>
</html>

<?php
// Conexão com o banco de dados (ajuste os valores conforme necessário)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recebe os dados do formulário
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$rua = $_POST['rua'];
$pkclinica = $_COOKIE['pkclinica'];
    // Insere os dados na tabela "logins"
    $sql = "INSERT INTO clinicas (pkclinica, nome, estado, cidade, telefone, rua) 
                        VALUES ('$pkclinica','$nome', '$estado', '$cidade', '$telefone', '$rua')";

    if ($conn->query($sql) === TRUE) {
        printf("<div class='container'>");
        printf("<center>Cadastro Realizado com sucesso!</center>");
        printf("<center><a href = 'homepage.php'>Voltar para o login</a></center>");
        printf("</div>");

    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }


$conn->close();

?>