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

    <div class = "header"><?php printf("<label>Olá, " . $_COOKIE['nome'] . "!</label>"); ?>
    <a href='selecionar_especialidade.php' class='btn'>Voltar</a></div>
    </div>

</body>
    <?php

    // Recebe os dados do formulário
    if($_COOKIE['contagem']==1){
        $espec = $_COOKIE['especialidade'];
    }else{
        $espec = $_POST["especialidade"];
        setcookie('especialidade', $espec, time()+3600);
    }
   
    
    
    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "medicos");

    // Verifica se a conexão foi bem sucedida
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // SQL para buscar todos os especialistas
    $sql = "SELECT * FROM medicos WHERE especialidade = '$espec'";
    $result = $conn->query($sql);

    // Exibe cada médico como opção no select
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo    "<form action='agenda_medico.php' method='post'>
                    <div class='listaMed'>
                    <div style='text-align: left;'> Dr. " .$row["nome"]. ", " .$row["especialidade"]. "</div>
                    <div style='text-align: left;'>" .$row["Cidade"]. "," .$row["Estado"]. "</div>
                    <div style='text-align: left;'>Telefone: ".$row["Telefone"]."</div>
                    <input type= 'hidden' name='crm' value=".$row['CRM'].">
                    <input type= 'hidden' name='nome' value=".$row['nome'].">
                    <input type= 'hidden' name='especialidade' value=".$row['especialidade'].">
                    <input type= 'hidden' name='cidade' value=".$row['Cidade'].">
                    <input type= 'hidden' name='estado' value=".$row['Estado'].">
                    <input type= 'hidden' name='telefone' value=".$row['Telefone'].">
                    <hr>
                    <button type='submit' name=".$row['CRM'].">Agendar</button></div>
                    </form>";

        }
    } else {
        echo "<p class='container'>Nenhum médico encontrado</p>";
    }



    $conn->close();

    ?>
</form>
</html>