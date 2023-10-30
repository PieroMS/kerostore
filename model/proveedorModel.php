<?php
    class proveedorModel{
        private $PDO;
        public function __construct(){
            require_once("c://xampp/htdocs/projectFact/config/db.php");
            $database = Database::getInstance();
            $this->PDO = $database->getConnection();
        }

        public function index(){
            $stament = $this->PDO->prepare("SELECT*FROM proveedores WHERE estado=1");
            return($stament->execute()) ? $stament->fetchAll(): false;
        }
        
        public function show($id){
            $stament = $this->PDO->prepare("SELECT*FROM proveedores WHERE id = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false;
        }
        
        public function store($nombre,$telefono,$direccion,$ruc){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("INSERT INTO proveedores VALUES(null,:nombre,:telefono,:direccion,:ruc,1)");
                $stament->bindParam(":nombre",$nombre);
                $stament->bindParam(":telefono",$telefono);
                $stament->bindParam(":direccion",$direccion);
                $stament->bindParam(":ruc",$ruc);
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

        public function update($id,$nombre,$telefono,$direccion,$ruc){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("UPDATE proveedores SET nombre = :nombre, telefono = :telefono, direccion = :direccion, ruc = :ruc WHERE id = :id");
                $stament->bindParam(":nombre",$nombre);
                $stament->bindParam(":telefono",$telefono);
                $stament->bindParam(":direccion",$direccion);
                $stament->bindParam(":ruc",$ruc);
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
                $stament = $this->PDO->prepare("UPDATE proveedores SET estado=0 WHERE id = :id");
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
