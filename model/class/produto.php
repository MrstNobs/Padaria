<?php 
    class Produto {
        public function criarProduto($nome_produto) {
            try {
                $pdo = Conexao::getConexao();
                $sql = "INSERT INTO produto (nome_produto) VALUE (:nome_produto)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nome_produto', $nome_produto);
                $stmt->execute();
            } catch (Exception $e) {
                die("Erro na criação o Comprador. <br>". $e->getMessage());
                return false;
            }
        }

        public function getProduto($id) {
            try {
                $pdo = Conexao::getConexao();
                $sql = "SELECT * FROM produto WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            } catch(Exception $e) {
                die("Erro ao pegar o Comprador. <br>". $e->getMessage());
                return false;
            }
        }

        public function atualizarProduto($id, $nome_produto){
            try {
                $pdo = Conexao::getConexao();
                $sql = "UPDATE produto SET nome_produto = :nome_produto WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':nome_produto', $nome_produto);
                $stmt->execute();
            }  catch(Exception $e) {
                die("Erro na Atualização do Comprador. <br>". $e->getMessage());
                return false;
            }
        }

        public function deletarProduto($id) {
            try {
                $pdo = Conexao::getConexao();
                $sql = "DELETE FROM produto WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            } catch(Exception $e) {
                die("Erro. <br>". $e->getMessage());
                return false;
            }
        }

        public function todos(){
            try {
                $pdo = Conexao::getConexao();
                $sql = "SELECT * FROM produto";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(Exception $e) {
                die("Erro. <br>.". $e->getMessage());
                return false;
            }
        }
    }
?>