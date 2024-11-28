<?php 
    class Comprador {
        public function criarComprador($nome, $telefone, $endereco) {
            try {
                $pdo = Conexao::getConexao();
                $sql = "INSERT INTO comprador (nome, telefone, endereco) VALUE (:nome, :telefone, :endereco)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':telefone', $telefone);
                $stmt->bindParam(':enderco', $endereco);
                $stmt->execute();
            } catch (Exception $e) {
                die("Erro na criação o Comprador. <br>". $e->getMessage());
                return false;
            }
        }

        public function getComprador($id) {
            try {
                $pdo = Conexao::getConexao();
                $sql = "SELECT * FROM comprador WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            } catch(Exception $e) {
                die("Erro ao pegar o Comprador. <br>". $e->getMessage());
                return false;
            }
        }

        public function atualizarComprador($id, $nome, $telefone, $endereco){
            try {
                $pdo = Conexao::getConexao();
                $sql = "UPDATE comprador SET nome = :nome, telefone = :telefone, endereco = :endereco WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':telefone', $telefone);
                $stmt->bindParam(':endereco', $endereco);
                $stmt->execute();
            }  catch(Exception $e) {
                die("Erro na Atualização do Comprador. <br>". $e->getMessage());
                return false;
            }
        }

        public function deletarComprador($id) {
            try {
                $pdo = Conexao::getConexao();
                $sql = "DELETE FROM comprador WHERE id = :id";
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
                $sql = "SELECT * FROM comprador";
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