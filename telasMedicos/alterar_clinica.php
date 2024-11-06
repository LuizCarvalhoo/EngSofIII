<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

</body>
<div class="fundo"></div>
</html>
<?php

// Recebe os dados do formulário
session_start();

$novoPkClinica = $_POST['pkclinica'];
$crm = $_COOKIE['crm'];
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "medicos");

// Verifica se a conexão foi bem sucedida
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// SQL para buscar todos os especialistas
$sql = "UPDATE medicos SET pkclinica = '$novoPkClinica' WHERE crm = '$crm'";
$result = $conn->query($sql);

// SQL para inserir a consulta na tabela "consultas"
//$sql = "INSERT INTO consultas (paciente, cpf, medico, crm, hora, data) VALUES ('$nome_paciente', '$cpf', '$nome_medico', '$crm', '$hora', '$data')";
printf("<div class='container'>");
printf("<center>Clinica Alterada!</center>");  
printf("</div>");
/*
if ($conn->query($sql) === TRUE) {

    printf("<div class='container'>");
    printf("<center>Sua consulta para o dia ".$data." às ".$hora." foi agendada!</center>");  
    printf("<center><a href='selecionar_especialidade.php' class='btn'>Voltar</a></center>");
    printf("</div>");
} else {
    echo "Erro ao agendar consulta: " . $conn->error;
}
*/
$conn->close();

?>
