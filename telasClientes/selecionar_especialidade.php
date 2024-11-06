<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Consulta</title>
    <link rel="stylesheet" href="../styles3.css">
</head>
<body>
    <div class="fundo"></div>
    
    <div class = "header"><?php printf("<label>Olá, " . $_COOKIE['nome'] . "!</label>"); ?>
    <a href='../index.html' class='btn'>Sair<a>
    </div>

    <div class="container3">
    <?php

    setcookie('contagem', 0, time()+3600);

        printf("<h1>Agendar Consulta</h1>");
        printf("<form action='selecionar_medico.php' method='post'>");
        printf("<label for='especialidades'>Selecione uma especialidade:</label>");
        printf("<select name='especialidade' required>");
        printf("<option value=''>Selecione...</option>");
    
            // Conexão com o banco de dados
            $conn = new mysqli("localhost", "root", "", "medicos");

            // Verifica se a conexão foi bem sucedida
            if ($conn->connect_error) {
                die("Erro de conexão: " . $conn->connect_error);
            }

            // SQL para buscar todos os especialistas
            $sql = "SELECT especialidade FROM especialidades";
            $result = $conn->query($sql);

            // Exibe cada médico como opção no select
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $valorOption = $row["especialidade"];
                    echo "<option value='" . $valorOption . "'>" . $row["especialidade"] ."</option>";
                }
            } else {
                echo "<option value=''>Nenhum médico encontrado</option>";
            }

            $conn->close();
            
            
            ?>
        </select>
        <button type="submit">Procurar</button>
        </form>
    </div>
    <div class="container">
        <?php
            printf("<h1>Minha Agenda</h1>");
            printf("<center><a href='ver_datas.php' class='btn'>Ver minhas consultas<a></center>");
        ?>
    </div>
</body>
</html>