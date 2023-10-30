<?php

    class Database {
        private static $instance = null;
        private $connection;
        private $inTransaction = false;
        
        private function __construct() {
            $this->connection = new PDO("mysql:host=localhost:3310;dbname=db_prueba", "root", "");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    
        public static function getInstance() {
            if (self::$instance == null) {
                self::$instance = new Database();
            }
            return self::$instance;
        }
    
        public function getConnection() {
            return $this->connection;
        }

        /*IMPLEMENTANDO COMMIT Y ROLLBACK*/
        public function beginTransaction() {
            if (!$this->inTransaction) {
                $this->connection->beginTransaction();
                $this->inTransaction = true;
            }
        }
    
        public function commit() {
            if ($this->inTransaction) {
                $this->connection->commit();
                $this->inTransaction = false;
            }
        }
    
        public function rollback() {
            if ($this->inTransaction) {
                $this->connection->rollback();
                $this->inTransaction = false;
            }
        }
    }









    // Ejemplo de uso:
    
    // Obtener una instancia de la base de datos
    // $database = Database::getInstance();
    
    // Obtener la conexión
    // $connection = $database->getConnection();
    
    // Ejecutar una consulta CRUD
    // $query = "SELECT * FROM tabla";
    // $stmt = $connection->query($query);
    // $result = $stmt->fetchAll();

?>