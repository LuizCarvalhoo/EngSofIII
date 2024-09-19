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
    </div>

  
    <div class="container">
        <?php
        
            printf("<h1>Minha Agenda</h1>");
            printf("<form action='consultas_medico.php' method='post'>");
            printf("<center><button type='submit'>Ver Agenda</button></center></form>");
        ?>
    </div>
</body>
</html>