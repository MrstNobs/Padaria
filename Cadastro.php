<?php 
    include './Conexao.php';
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $nome_comprador = $_POST['nome'];
            $telefone_comprador = $_POST['telefone'];
            $endereco_comprador = $_POST['endereco'];

            $sql = "INSERT INTO compradores (nome, telefone, endereco) VALUES (:nome_comprador, :telefone_comprador, :endereco_comprador)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nome_comprador', $nome_comprador);
            $stmt->bindParam(':telefone_comprador', $telefone_comprador);
            $stmt->bindParam(':endereco_comprador', $endereco_comprador);
            $stmt->execute();
            header('location: cadastro.php');
            exit;
        } catch(Exception $e) {
            die("Falha na Inserçao. <br>". $e->getMessage());
            return false;
        }
    } 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - CLiente</title>
</head>
<body>

    <form method="POST" action="./cadastro.php">
        <label for="nome"> Nome: </label>
        <input type="text" id="nome" name="nome" required> <br>

        <label for="telefone"> Telefone: </label>
        <input type="text" id="telefone" name="telefone" required> <br>

        <label for="endereco"> Endereço: </label>
        <input type="text" id="endereco" name="endereco" required> <br>

        <button type="submit"> Cadastrar </button>
    </form>
    
</body>
</html>