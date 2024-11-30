<?php 
    include './Conexao.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $compradorID = $_POST['comprador'];
            $DataAtual = date('m-d-Y');
            $produtoID = $_POST['produto'];
            $quantidade = $_POST['quantidade'];
            $subtotal = $_POST['custo'];

            $sql = "INSERT INTO itemvenda (produto_id, quantidade, subtotal) VALUES (:produtoID, :quantidade, :subtotal)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':produtoID', $produtoID);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':subtotal', $subtotal);
            $stmt->execute();

            header('location: itemVenda.php');
            exit;

        } catch (Exception $e) {
            die("Erro meu amigo. <br>". $e->getMessage());
            return false;
        }
    }

    $sql = "SELECT * FROM compradores";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $clientes = $stmt->fetchAll();

    $sqlProdutos = "SELECT * FROM produtos";
    $stmtProduto = $conn->prepare($sqlProdutos);
    $stmtProduto->execute();
    $produtos = $stmtProduto->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item da Venda</title>

</head>
<body>
    <form method="POST" action="./itemVenda.php">
        <label for="comprador"> Clientes: </label>
        <select name="comprador" id="comprador">
            <option value=""> Selecione </option>
            <?php foreach($clientes as $cliente): ?>
                <option value="<?=$cliente['id']?>"> <?=$cliente['nome']?> </option>
            <?php endforeach; ?>
        </select> <br>

        <label for="produto"> Produto: </label>
        <select name="produto" id="produto">
            <option value=""> Selecione </option>
            <?php foreach($produtos as $produto): ?>
                <option value="<?=$produto['id']?>" data-preco="<?=$produto['preco']?>"> <?=$produto['nome_produto']?> </option>
            <?php endforeach; ?>
        </select> <br>

        <label for="quantidade">Quantidade: </label>
        <input type="number" id="quantidade" name="quantidade" required> <br>

        <label for="custo"> Total R$ </label>
        <input type="text" id="custo" name="custo" readonly> <br>


        <button type="submit"> Vender </button>

    </form>

    <script> 
    function calculoTotal(){
        var produtoSelect = document.getElementById('produto');
        var quantidade = document.getElementById('quantidade').value;
        var custo = document.getElementById('custo');
        var preco = produtoSelect.options[produtoSelect.selectedIndex].getAttribute('data-preco');
        if(preco && quantidade) {
            custo.value = (preco * quantidade).toFixed(2);
        }
    } 
    document.getElementById('produto').addEventListener('change', calculoTotal);
    document.getElementById('quantidade').addEventListener('input', calculoTotal);
    </script>
</body>
</html>