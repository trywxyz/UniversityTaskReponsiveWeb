<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Estados e Cidades</title>
</head>
<style>
    body{
        text-align:center;
    }
</style>
<body>

    <h2>Selecione um Estado</h2>
    
    <form>
        <label for="estados">Estados:</label>
        <select id="estados" name="estados">
            <option value="">-- Escolha um Estado --</option>
            <option value="PR">Paraná</option>
            <option value="SP">São Paulo</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="MG">Minas Gerais</option>
        </select>

        <br><br>

        <label for="cidades">Cidades:</label>
        <select id="cidades" name="cidades">
            <option value="">-- Escolha uma Cidade --</option>
        </select>
    </form>

    <script>
        document.getElementById("estados").addEventListener("change", function() {
            let estadoSelecionado = this.value;
            let cidadesSelect = document.getElementById("cidades");

            // Limpa as opções anteriores
            cidadesSelect.innerHTML = '<option value="">-- Escolha uma Cidade --</option>';

            if (estadoSelecionado) {
                fetch("index.php?estado=" + estadoSelecionado)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(cidade => {
                            let option = document.createElement("option");
                            option.value = cidade;
                            option.textContent = cidade;
                            cidadesSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error("Erro ao buscar cidades:", error));
            }
        });
    </script>

</body>
</html>

<?php
// Se houver um parâmetro "estado" na URL, processamos a requisição AJAX
if (isset($_GET['estado'])) {
    // Definição das cidades associadas a cada estado
    $cidadesPorEstado = [
        "PR" => ["Curitiba", "Londrina", "Maringá", "Cascavel"],
        "SP" => ["São Paulo", "Campinas", "Santos", "Ribeirão Preto"],
        "RJ" => ["Rio de Janeiro", "Niterói", "Petrópolis", "Volta Redonda"],
        "MG" => ["Belo Horizonte", "Uberlândia", "Juiz de Fora", "Contagem"]
    ];

    $estado = $_GET['estado'];

    // Retorna as cidades como JSON
    if (array_key_exists($estado, $cidadesPorEstado)) {
        echo json_encode($cidadesPorEstado[$estado]);
    } else {
        echo json_encode([]);
    }
    exit; // Evita que o restante do HTML seja enviado na resposta AJAX
}
?>

//php -S localhost:8000
//http://localhost:8000/index.php
