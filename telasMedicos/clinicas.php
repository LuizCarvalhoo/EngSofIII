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
    $sql = "SELECT * FROM clinicas";
    $result = $conn->query($sql);

    // Exibe cada médico como opção no select
    
       if ($result->num_rows > 0) {
        setcookie('pkclinica', 0, time()+3600);
        printf("<div class='espacamento'>");
        printf("<center><a href='CadastroClínica.php' class='btn'>Adicionar Clinica</a></center>");
        while ($row = $result->fetch_assoc()) {
            $_COOKIE['pkclinica'] = $_COOKIE['pkclinica']+1;
            $nome = $row["nome"];
            $rua = $row["rua"];
            $cidade = $row["cidade"];
            //$data = date("d/m/Y", strtotime($data));
            echo "<div class=listaMed>
                Nome: ".$nome."
                <div>Cidade: ".$cidade."</div>
                <div>Rua: ".$rua." </div>
                <div><form action='cancelar_consulta.php' method='post'>
                <input type= 'hidden' name='pkclinica' value=".$row['pkclinica'].">
                <input type= 'hidden' name='nome' value=".$row['nome'].">
                <input type= 'hidden' name='cidade' value=".$row['cidade'].">
                <input type= 'hidden' name='rua' value=".$row['rua'].">
                <button type='submit' class= 'btn'>Ingressar</button></form></div>
                
                <form action='alterar_clinica.php' method='post'>
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