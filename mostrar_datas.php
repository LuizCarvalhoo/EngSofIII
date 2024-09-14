<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda do médico</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
    <div class="fundo">
    </div>
    <div class = "header"><?php printf("<label>Olá, " . $_COOKIE['nome'] . "!</label>"); ?>
    <a href='selecionar_medico.php' class='btn'>Voltar</a></div>
    </div>
</body>
    
    <?php
    
    $crm = $_POST["crm"];
    $nome = $_POST["nome"];
    $especialidade = $_POST["especialidade"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $telefone = $_POST["telefone"];
    $data = $_POST["data"];
    $status = 0;
    $pesquisando = 1;
    $horario_agendado = [];
    $cont_linha = 0;

    //echo "<div>".$data."</div>";

    printf("<form action='mostrar_datas.php' method='post'>");
    printf("<div class='calendarioMed'>");
    printf("<div style='text-align: left;'> Dr. " .$nome. ", " .$especialidade. "</div>");
    printf("<div style='text-align: left;'>" .$cidade. "," .$estado. "</div>");
    printf("<div style='text-align: left;'>Telefone: ".$telefone."</div>");
    printf("<div>Escolha uma data</div>");
    printf("<input type='date' name='data' value=".$data."></input>");
    printf("<input type= 'hidden' name='crm' value=".$crm.">");
    printf("<input type= 'hidden' name='nome' value=".$nome.">");
    printf("<input type= 'hidden' name='especialidade' value=".$especialidade.">");
    printf("<input type= 'hidden' name='cidade' value=".$cidade.">");
    printf("<input type= 'hidden' name='estado' value=".$estado.">");
    printf("<input type= 'hidden' name='telefone' value=".$telefone.">");
    //printf("<input type= 'hidden' name='data' value='.$data.'>");
    
    printf("<button type='submit'>Pesquisar</button>");
    printf("<div>Mostrando horários para ".$data.".");
    
    $conn = new mysqli("localhost", "root", "", "medicos");
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $sql = "SELECT hora FROM consultas WHERE crm = '$crm' AND data = '$data'";
    $result = $conn->query($sql);
    $horario = 7;
    $horarioStr = "0".$horario. ":00";

    if ($result->num_rows < 10) {
        
        while ($row = $result->fetch_assoc()) {
            $horario_agendado[$cont_linha] = $row['hora'];
            $cont_linha = $cont_linha + 1;
        }
        //echo "||" . $horario_agendado[1] . "||";

        $row = $result->fetch_assoc();
        while ($horario <= 17) {
            
            if($horario != 12 && !in_array($horarioStr,$horario_agendado)){
                echo  "<form action='agendar_consulta.php' method='post'>
                        <div class='listaMed'>
                        <div style='text-align: left;'>".$horario.":00</div>
                        <hr>";

                printf("<input type= 'hidden' name='crm' value=".$crm.">");
                printf("<input type= 'hidden' name='nome' value=".$nome.">");
                printf("<input type= 'hidden' name='especialidade' value=".$especialidade.">");
                printf("<input type= 'hidden' name='cidade' value=".$cidade.">");
                printf("<input type= 'hidden' name='estado' value=".$estado.">");
                printf("<input type= 'hidden' name='telefone' value=".$telefone.">");
                printf("<input type= 'hidden' name='hora' value=".$horarioStr.">");
                printf("<input type= 'hidden' name='dataag' value=".$data.">");
                printf("<button type='submit'>Agendar</button></div></form>");   

                //"<button>".$horario.":00</button>";
            }
            $horario = $horario + 1;
            if($horario < 10){
                $horarioStr = "0" .$horario. ":00";
            }else{
                $horarioStr = "" .$horario. ":00";
            }
            
        }
    } else {
        echo "<p class='container'>Nenhum horário disponível</p>";
    }    

    
    printf("</div>");
    printf("</div></form>");
    ?>
</form>
</html>