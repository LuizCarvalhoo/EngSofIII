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

$hora = $_POST['hora'];
$data = $_POST["data"];
$crm = $_POST["crm"];

// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "medicos");

// Verifica se a conexão foi bem sucedida
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// SQL para buscar todos os especialistas
$sql = "DELETE FROM consultas WHERE data='$data' AND hora = '$hora' AND crm = '$crm'";
$result = $conn->query($sql);

// SQL para inserir a consulta na tabela "consultas"
//$sql = "INSERT INTO consultas (paciente, cpf, medico, crm, hora, data) VALUES ('$nome_paciente', '$cpf', '$nome_medico', '$crm', '$hora', '$data')";
printf("<div class='container'>");
$data = date("d/m/Y", strtotime($data));
printf("<center>Sua consulta para o dia ".$data." às ".$hora." foi cancelada!</center>");  
printf("<center><a href='homepage.php' class='btn'>Voltar</a></center>");
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
