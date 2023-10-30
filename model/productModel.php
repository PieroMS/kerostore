<?php
    class productModel{
        private $PDO;
        public function __construct(){
            require_once("c://xampp/htdocs/projectFact/config/db.php");
            $database = Database::getInstance();
            $this->PDO = $database->getConnection();
        }

        public function index(){
            $stament = $this->PDO->prepare("SELECT p.id, p.nombre, c.categoria, p.stock FROM producto p INNER JOIN categoria c ON p.id_categoria=c.id WHERE p.estado=1");
            return($stament->execute()) ? $stament->fetchAll(): false;
        }

        public function selectCat(){
            $stament = $this->PDO->prepare("SELECT id, categoria FROM categoria WHERE estado=1");
            return($stament->execute()) ? $stament->fetchAll(PDO::FETCH_ASSOC): false;
        }

        public function show($id){
            $stament = $this->PDO->prepare("SELECT*FROM producto WHERE id = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false;
        }
        
        public function store($nombre, $categoria, $stock){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("INSERT INTO producto VALUES(null,:nombre,:stock,1,:id_categoria)");
                $stament->bindParam(":nombre",$nombre);
                $stament->bindParam(":stock",$stock);
                $stament->bindParam(":id_categoria",$categoria);
                if ($stament->execute()) {
                    $this->PDO->commit(); // Confirmar la transacción si la consulta se ejecuta correctamente
                    return $this->PDO->lastInsertID();
                } else {
                    $this->PDO->rollBack(); // Revertir la transacción en caso de error
                    return false;
                }
            } catch (PDOException $e) {
                $this->PDO->rollBack(); // Revertir la transacción en caso de error
                echo 'Error: ' . $e->getMessage();
            }
        }
        
        public function update($id, $nombre, $categoria, $stock){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("UPDATE producto SET nombre = :nombre, stock = :stock, id_categoria = :categoria WHERE id = :id");
                $stament->bindParam(":nombre",$nombre);
                $stament->bindParam(":stock",$stock);
                $stament->bindParam(":categoria",$categoria);
                $stament->bindParam(":id",$id);
                if ($stament->execute()) {
                    $this->PDO->commit(); // Confirmar la transacción si la consulta se ejecuta correctamente
                    return $id;
                } else {
                    $this->PDO->rollBack(); // Revertir la transacción en caso de error
                    return false;
                }
            }catch (PDOException $e) {
                $this->PDO->rollBack(); // Revertir la transacción en caso de error
                echo 'Error: ' . $e->getMessage();
            }
        }   

        public function destroy($id){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("UPDATE producto SET estado=0 WHERE id = :id");
                $stament->bindParam(":id",$id);
                if ($stament->execute()) {
                    $this->PDO->commit(); // Confirmar la transacción si la consulta se ejecuta correctamente
                    return $id;
                } else {
                    $this->PDO->rollBack(); // Revertir la transacción en caso de error
                    return false;
                }
            }catch (PDOException $e) {
                $this->PDO->rollBack(); // Revertir la transacción en caso de error
                echo 'Error: ' . $e->getMessage();
            }
        } 
    }
?>
