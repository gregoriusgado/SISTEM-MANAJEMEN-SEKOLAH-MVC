<?php

class Database {

    private static $conn;

    public static function getConnection() {
        if (!self::$conn) {
            $config = require __DIR__ . '/../../config/conn.php';

            try{
                self::$conn = new PDO(
                    "mysql:host={$config['host']};dbname={$config['dbname']}",
                    $config['user'],$config['pass']
                   
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch (PDOException $e) {
                die("Database Error ". $e->getMessage());
            }
        }
         return self::$conn; 
      
    }


}
$conn = Database::getConnection();
