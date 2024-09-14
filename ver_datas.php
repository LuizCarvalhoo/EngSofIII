<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar médico</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
    <div class="fundo">
    </div>

    <div class = "header"><?php printf("<label>Olá, " . $_COOKIE['nome'] . "!</label>"); ?>
    <a href='selecionar_especialidade.php' class='btn'>Voltar</a></div>
    </div>

</body>
    <?php
    $cpf = $_COOKIE['cpf'];
    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "medicos");

    // Verifica se a conexão foi bem sucedida
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // SQL para buscar todos os especialistas
    $sql = "SELECT * FROM consultas WHERE cpf = '$cpf'";
    $result = $conn->query($sql);

    // Exibe cada médico como opção no select
    if ($result->num_rows > 0) {
        printf("<div class='espacamento'>");
        while ($row = $result->fetch_assoc()) {
            echo "<div class=listaMed>Data: ".$row["data"]."
                <div>Horário: ".$row["hora"]."</div>
                <div>Dr. ".$row["medico"]."</div>
                </div>";
        }
        printf("</div>");
    } else {
        echo "<p class='container'>Nenhum médico encontrado</p>";
    }



    $conn->close();

    ?>
</form>
</html>