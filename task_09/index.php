<?php
// Configuração do banco de dados
$servername = "localhost";
$username = "root";  // Altere se necessário
$password = "";      // Altere se necessário
$dbname = "ua10";

try {
    // Criando a conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os valores do formulário
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];

        // Prepara a SQL para inserir um novo produto
        $stmt = $conn->prepare("INSERT INTO Produtos (descricao_produto, preco_produto) VALUES (:descricao, :preco)");

        // Associa os parâmetros de forma segura
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);

        // Executa a inserção
        if ($stmt->execute()) {
            echo "<p style='color: green;'>Produto inserido com sucesso!</p>";
        } else {
            echo "<p style='color: red;'>Erro ao inserir produto.</p>";
        }
    }
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Fecha a conexão
$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>
<body>
    <h2>Cadastro de Produto</h2>
    <form method="POST">
        <label>Descrição do Produto:</label>
        <input type="text" name="descricao" required>
        <br><br>

        <label>Preço do Produto:</label>
        <input type="number" step="0.01" name="preco" required>
        <br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
