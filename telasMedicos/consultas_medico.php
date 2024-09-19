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
    <a href='homepage.php' class='btn'>Voltar</a></div>    
    </div>
    

    <div class="calendarioMed3">
        <?php
         printf("<form action='mostrar_datas.php' method='post'>");
         printf("<input type='date' name='data' value=today></input>");
         printf("<button type='submit'>Pesquisar</button></form>");
        ?>
    </div>

    <div class="calendarioMed2">
        <?php
            $crm = $_COOKIE['crm'];
            
            printf("<h1>Hoje</h1>");
            $conn = new mysqli("localhost", "root", "", "medicos");

            if ($conn->connect_error) {
                die("Erro de conexão: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM consultas WHERE crm = '$crm'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                //printf("<div class='espacamento'>");
                while ($row = $result->fetch_assoc()) {
                    $data = $row["data"];
                    $data = date("d/m/Y", strtotime($data));
                    echo "<form action='cancelar_atendimento.php' method='post'>
                    <div class=listaMed>Data: ".$data."
                    <div>Horário: ".$row["hora"]."</div>
                    <div>Dr. ".$row["medico"]."</div>
                    <input type='hidden' name='hora' value=".$row["hora"].">
                    <input type='hidden' name='data' value=".$row["data"].">
                    <input type='hidden' name='crm' value=".$row["crm"].">
                    <button type='submit' class= 'btn2'>Cancelar</button></div></form>";

                    
                }
            }
        ?>
    </div>
</body>
</html>