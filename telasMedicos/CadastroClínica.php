<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Médicos</title>
    <link rel="stylesheet" href="../styles3.css">
</head>
<body>
    <div class="fundoMed"></div>

    <div class = "header">
    <a href='./clinicas.php' class='btn'>Voltar</a></div>
    </div>

    <div class="nav">
    <div class="container">
        <h1>Nova Clínica</h1>
        
        <form method="POST" action="processar_cadastro_Clinica.php">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>


            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="">Selecione</option>
                <?php
                // Array com os estados brasileiros
                $estados = array(
                    "AC" => "Acre",
                    "AL" => "Alagoas",
                    "AP" => "Amapá",
                    "AM" => "Amazonas",
                    "BA" => "Bahia",
                    "CE" => "Ceara",
                    "DF" => "Distrito Federal",
                    "ES" => "Espirito Santo",
                    "GO" => "Goiás",
                    "MA" => "Maranhão",
                    "MT" => "Mato Grosso",
                    "MS" => "Mato Grosso do Sul",
                    "MG" => "Minas Gerais",
                    "PA" => "Pará",
                    "PB" => "Paraíba",
                    "PR" => "Paraná",
                    "PE" => "Pernanbuco",
                    "PI" => "Piauí",
                    "RJ" => "Rio de Janeiro",
                    "RN" => "Rio Grande do Norte",
                    "RS" => "Rio Grande do Sul",
                    "RO" => "Rondônia",
                    "RR" => "Roraima",
                    "SC" => "Santa Catarina",
                    "SP" => "São Paulo",
                    "SE" => "Sergipe",
                    "TO" => "Tocantins"
                );

                // Iterando sobre o array para criar as opções
                foreach ($estados as $sigla => $nome) {
                    echo "<option value='$sigla'>$nome</option>";
                }
                ?>
            </select>

            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" required>

            <label for="rua">Rua:</label>
            <input type="text" id="rua" name="rua" required>

            <label for="telefone">Telefone:</label>
            <input type="phone" id="telefone" name="telefone" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
            
            <input type= 'hidden' name='pkclinica' value= <?php $_COOKIE['pkclinica'] ?> >
          
            <button type="submit">Cadastrar</button>
        </form>
    </div>
            </div>
</body>
</html>

