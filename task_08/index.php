<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processa os dados enviados
    echo "<h2>Dados Recebidos:</h2>";

    // Exibir os campos Nome, Idade e Cidade
    $dados = [
        "Nome" => $_POST["nome"] ?? "",
        "Idade" => $_POST["idade"] ?? "",
        "Cidade" => $_POST["cidade"] ?? ""
    ];

    foreach ($dados as $chave => $valor) {
        echo "<strong>$chave:</strong> $valor <br>";
    }

    // Exibir os estados selecionados
    if (!empty($_POST["estados"])) {
        echo "<strong>Estados que visitou:</strong><br>";
        foreach ($_POST["estados"] as $estado) {
            echo "- $estado <br>";
        }
    } else {
        echo "<strong>Estados que visitou:</strong> Nenhum selecionado.<br>";
    }

    echo "<br><a href='index.php'>Voltar</a>";
} else {
    // Exibe o formulário
    echo '<!DOCTYPE html>
    <html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Formulário</title>
    </head>
    <body>
        <form method="POST">
            <label>Nome: <input type="text" name="nome"></label><br>
            <label>Idade: <input type="text" name="idade"></label><br>
            <label>Cidade: <input type="text" name="cidade"></label><br>

            <label>Estados que visitou:</label><br>
            <select name="estados[]" multiple>
                <option value="SP">São Paulo</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="MG">Minas Gerais</option>
                <option value="PR">Paraná</option>
            </select><br>

            <button type="submit">Enviar</button>
        </form>
    </body>
    </html>';
}
?>
