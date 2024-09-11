<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Médicos</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
    <div class="fundoMed"></div>
    <div class="container">
        <h1>Cadastro de Médicos</h1>
        <form method="POST" action="processar_cadastro_Med.php">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="especialidade">Especialidade:</label>
            <select id="especialidade" name="especialidade" required>
                <option value="">Selecione</option>
                <?php
                // Conexão com o banco de dados
                $conn = new mysqli("localhost", "root", "", "medicos");

                // Verifica se a conexão foi bem sucedida
                if ($conn->connect_error) {
                    die("Erro de conexão: " . $conn->connect_error);
                }

                // SQL para buscar todos os médicos
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


                // Iterando sobre o array para criar as opções
                foreach ($estados as $sigla => $nome) {
                    echo "<option value='$sigla'>$nome</option>";
                }
                ?>
            </select>

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

            <label for="telefone">Telefone:</label>
            <input type="phone" id="telefone" name="telefone" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
        
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>

            <label for="crm">CRM:</label>

            <input type="text" id="crm" name="crm" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <label for="confirma_senha">Confirmar Senha:</label>
            <input type="password" id="confirma_senha" name="confirma_senha" required>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>

