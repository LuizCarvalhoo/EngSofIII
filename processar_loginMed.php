<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<div class="fundo"></div>
</html>

<?php
// Conexão com o banco de dados (ajuste as informações)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicos";
$nome_paciente = "indefinido";
//printf("<form id='myForm' action='pagina2.php' method='post'>");
//printf("<input type='hidden' name='nome' value='João'></form>");

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recebe os dados do formulário
$crm = $_POST['crm'];
$senha = $_POST['senha'];



// Consulta o banco de dados
$sql = "SELECT * FROM medicos WHERE crm = '$crm' AND senha = '$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login válido, redireciona para a página de sucesso
    $row = $result->fetch_assoc();
    $nome_medico = $row["nome"];
    //$cpf = $row["cpf"];
    setcookie('nome_medico', $nome_medico, time()+3600);
    setcookie('crm', $crm, time()+3600);

    header("Location: telasMedicos/homepage.php");
    exit();
} else {
    // Login inválido, redireciona para a página de login com mensagem de erro
    
        printf("<div class='container'>");
        printf("<center>CPF ou senha invalidos!</center>");
        printf("<center><a href = 'MedLogin.php'>Voltar para o login</a></center>");
        printf("</div>");
}

$conn->close();
?>