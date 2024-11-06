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
    
    <div class = "header"><?php printf("<label>Olá, Dr. " . $_COOKIE['nome_medico'] . "!</label>"); ?>
    <a href='../MedLogin.php' class='btn'>Sair<a>    
    </div>

  
    <div class="container3">
        <?php
            printf("<h1>Minha Agenda</h1>");
            printf("<form action='consultas_medico.php' method='post'>");
            printf("<center><button type='submit'>Ver Agenda</button></center></form>");
            
        ?>
    </div>
    <div class="container3">
        <?php
             $conn = new mysqli("localhost", "root", "", "medicos");
            printf("<h1>Minha Clinica</h1>");
            // Consulta o banco de dados
            $clinicapk = $_COOKIE['clinica'];
            $sql = "SELECT nome FROM clinicas WHERE pkclinica = '$clinicapk'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Login válido, redireciona para a página de sucesso
                $row = $result->fetch_assoc();
                $nome_clinica = $row["nome"];
                printf("<center><h1>".$nome_clinica."</h1></center>");
            } else {
                // Login inválido, redireciona para a página de login com mensagem de erro
    
                    printf("<center>Você ainda não está em uma clinica.</center>");
                   
            }
            printf("<form action='clinicas.php' method='post'>");
            printf("<center><button type='submit'>Ver Clínica</button></center></form>");
            
        ?>
    </div>
</body>
</html>