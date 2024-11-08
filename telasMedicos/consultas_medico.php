<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar médico</title>
    <link rel="stylesheet" href="../styles3.css">
</head>
<body>
    <div class="fundo">
    </div>

    <div class = "header"><?php printf("<label>Olá, Dr." . $_COOKIE['nome_medico'] . "!</label>"); ?>
    <a href='homepage.php' class='btn'>Voltar</a></div>
    </div>
    <?php
    $crm = $_COOKIE['crm'];
    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "medicos");

    // Verifica se a conexão foi bem sucedida
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // SQL para buscar todos os especialistas
    $sql = "SELECT * FROM consultas WHERE crm = '$crm'";
    $result = $conn->query($sql);

    // Exibe cada médico como opção no select
    if ($result->num_rows > 0) {
        printf("<div class='espacamento'>");
        while ($row = $result->fetch_assoc()) {
            $data = $row["data"];
            $datamos = date("d/m/Y", strtotime($data));
            //$data = date("d/m/Y", strtotime($data));
            echo "<div class=listaMed>
                Data: ".$datamos."
                <div>Horário: ".$row["hora"]."</div>
                <div> ".$row["paciente"]." </div>
                <div><form action='cancelar_consulta.php' method='post'>
                <input type= 'hidden' name='cpf' value=".$row['cpf'].">
                <input type= 'hidden' name='crm' value=".$row['crm'].">
                <input type= 'hidden' name='data' value=".$row['data'].">
                <input type= 'hidden' name='hora' value=".$row['hora'].">
                <button type='submit' class= 'btn2'>Cancelar</button></form></div>
                
                <form action='alterar_consulta.php' method='post'>
                <input type= 'hidden' name='cpf' value=".$row['cpf'].">
                <input type= 'hidden' name='crm' value=".$row['crm'].">
                <input type= 'hidden' name='data' value=".$row['data'].">
                <input type= 'hidden' name='hora' value=".$row['hora'].">
                
                </div>";
        }
        printf("</div>");
    } else {
        echo "<p class='container'>Você ainda não tem consultas agendadas.</p>";
    }



    $conn->close();

    ?>
</form>
</body>
</html>