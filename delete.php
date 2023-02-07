<?php

/**
 * PHP MySQL Delete Data Demo
 */
class DeleteDataDemo {

    const DB_HOST = 'localhost';
    const DB_NAME = 'productinfo';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    /**
     * PDO instance
     * @var PDO 
     */
    private $pdo = null;

    /**
     * Open a database connection to MySQL
     */
    public function __construct() {
        // open database connection
        $conStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
        try {
            $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Truncate the tasks table
     */
    public function truncateTable() {
        $sql = 'TRUNCATE TABLE product';
        return $this->pdo->exec($sql);
        
    }

    

    /**
     * close the database connection
     */
    public function __destruct() {
        $this->pdo = null;
    }

}

$obj = new DeleteDataDemo();

// truncate table 
$obj->truncateTable();
header('location: list.php');