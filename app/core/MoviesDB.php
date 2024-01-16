<?php 
namespace App\core;
use App\config\Config;
use PDO, PDOException;

class MoviesDB {
    public function connect(){
        try {
            $dsn = "mysql:host=" .HOST. ";dbname=" .NAME;
            $pdo = new PDO($dsn, USERNAME, PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            die("ERROR MESSAGE:" .$e->getMessage());
        }
        
    }

}
