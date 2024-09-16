<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles3.css">
</head>

<body>

</body>
<div class="fundo"></div>
</html>
<?php

// Recebe os dados do formulário
session_start();

$nome_paciente = $_COOKIE['nome'];
$cpf = $_COOKIE['cpf'];
$crm = $_POST["crm"];
$nome_medico = $_POST["nome"];
$especialidade = $_POST["especialidade"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$data = $_POST["dataag"];
$hora = $_POST["hora"];


// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "medicos");

// Verifica se a conexão foi bem sucedida
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// SQL para buscar todos os especialistas
$sql = "SELECT nome FROM medicos WHERE CRM = '$crm'";
$result = $conn->query($sql);

// Exibe cada médico como opção no select
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nome_medico = $row['nome'];
    }
} 

// SQL para inserir a consulta na tabela "consultas"
$sql = "INSERT INTO consultas (paciente, cpf, medico, crm, hora, data) VALUES ('$nome_paciente', '$cpf', '$nome_medico', '$crm', '$hora', '$data')";

if ($conn->query($sql) === TRUE) {

    printf("<div class='container'>");
    printf("<center>Sua consulta para o dia ".$data." às ".$hora." foi agendada!</center>");  
    printf("<center><a href='selecionar_especialidade.php' class='btn'>Voltar</a></center>");
    printf("</div>");
} else {
    echo "Erro ao agendar consulta: " . $conn->error;
}

$conn->close();

?>
