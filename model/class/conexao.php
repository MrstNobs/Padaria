<?php 
    class Conexao {
        private static $instancia;
        public static function getConexao(){
            if(!isset(self::$instancia)){
                try {
                    self::$instancia = new PDO("mysql:host=localhost; dbname=pizzaria", "root", "");
                    self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch(PDOException $e) {
                    die("Erro na Conexão. <br>". $e->getMessage());
                    return false;
                }
            }
            return self::$instancia;
        }

        public static function closeConexao(){
            self::$instancia = null;
        }
    }
?>