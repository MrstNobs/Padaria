<?php 
    include './Conexao.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        try {
            $nome_produto = $_POST['nome_produto'];
            $descricao = $_POST['descricao_produto'];
            $preco = $_POST ['preco_produto'];

            $sql = "INSERT INTO produtos (nome_produto, descricao, preco) VALUES (:nome_produto, :descricao, :preco)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nome_produto', $nome_produto);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':preco', $preco);
            $stmt->execute();
            header('location: Produtos.php');
            exit;
        } catch (Exception $e) {
            die("Erro na Inserção. <br>". $e->getMessage());
            return false;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>

    <form method="POST" action="./Produtos.php">
        <label for="nome_produto"> Nome do Produto: </label>
        <input type="text" id="nome_produto" name="nome_produto" required> <br>

        <label for="descricao_produto"> Descrição: </label>
        <input type="text" id="descricao_produto" name="descricao_produto" required> <br>

        <label for="preco_produto"> Preço(unitário)R$: </label>
        <input type="text" id="preco_produto" name="preco_produto" required> <br> <br>
        
        <button type="submit"> Inserir </button>
    </form>
    
</body>
</html>