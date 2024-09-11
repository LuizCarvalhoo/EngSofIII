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
</body>
    
    <?php
   
    $crm = $_POST["crm"];
    $nome = $_POST["nome"];
    $especialidade = $_POST["especialidade"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $telefone = $_POST["telefone"];
    $status = 0;
    $pesquisando = 1;

    printf("<form action='mostrar_datas.php' method='post'>");
    printf("<div class='calendarioMed'>");
    printf("<div style='text-align: left;'> Dr. " .$nome. ", " .$especialidade. "</div>");
    printf("<div style='text-align: left;'>" .$cidade. "," .$estado. "</div>");
    printf("<div style='text-align: left;'>Telefone: ".$telefone."</div>");
    printf("<div>Escolha uma data</div>");
    printf("<input type='date' name='data'></input>");
    printf("<input type= 'hidden' name='crm' value=".$crm.">");
    printf("<input type= 'hidden' name='nome' value=".$nome.">");
    printf("<input type= 'hidden' name='especialidade' value=".$especialidade.">");
    printf("<input type= 'hidden' name='cidade' value=".$cidade.">");
    printf("<input type= 'hidden' name='estado' value=".$estado.">");
    printf("<input type= 'hidden' name='telefone' value=".$telefone.">");
    
    printf("<button type='submit'>Pesquisar</button></div></form>");
            
    ?>
</form>
</html>