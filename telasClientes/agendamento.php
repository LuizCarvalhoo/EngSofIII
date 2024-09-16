<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Médicos</title>
    <link rel="stylesheet" href="../styles3.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Médicos</h1>
        <form action="selecionar_medico.php" method="post">
            <select name="medico_id" required>
                <option value="">Selecione um médico:</option>
                <?php

                // Conexão com o banco de dados
                $conn = new mysqli("localhost", "root", "", "medicos");

                // Verifica se a conexão foi bem sucedida
                if ($conn->connect_error) {
                    die("Erro de conexão: " . $conn->connect_error);
                }

                // SQL para buscar todos os médicos
                $sql = "SELECT CRM, nome, especialidade FROM medicos ORDER BY especialidade ASC";
                $result = $conn->query($sql);

                // Exibe cada médico como opção no select
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["CRM"] . "'>" . $row["especialidade"] . " - " . $row["nome"] . "</option>";
                    }
                } else {
                    echo "<option value=''>Nenhum médico encontrado</option>";
                }

                $conn->close();

                ?>
            </select>
            <button type="submit">Selecionar</button>
        </form>
    </div>
</body>
</html>