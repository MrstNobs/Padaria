<?php 
    $host = 'localhost';
    $dbname = 'padaria';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die("Erro na Conexão. <br>". $e->getMessage());
        return false;
    }

?>