<?php
 /*   class clientModel{
        private $PDO;
        public function __construct(){
            require_once("c://xampp/htdocs/projectFact/config/db.php");
            $database = Database::getInstance();
            $this->PDO = $database->getConnection();
        }

        public function index(){
            $stament = $this->PDO->prepare("SELECT*FROM cliente WHERE estado=1");
            return($stament->execute()) ? $stament->fetchAll(): false;
        }
        
        public function show($id){
            $stament = $this->PDO->prepare("SELECT*FROM cliente WHERE id = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false;
        }

        public function store($nombre,$ruc,$telefono,$direccion){
            $stament = $this->PDO->prepare("INSERT INTO cliente VALUES(null,:nombre,:ruc,:telefono,:direccion,1)");
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":ruc",$ruc);
            $stament->bindParam(":telefono",$telefono);
            $stament->bindParam(":direccion",$direccion);
            return ($stament->execute()) ? $this->PDO->lastInsertID() : false;
        }

        public function update($id,$nombre,$ruc,$telefono,$direccion){
            $stament = $this->PDO->prepare("UPDATE cliente SET nombre = :nombre, ruc = :ruc, telefono = :telefono, direccion = :direccion WHERE id = :id");
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":ruc",$ruc);
            $stament->bindParam(":telefono",$telefono);
            $stament->bindParam(":direccion",$direccion);
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $id : false;
        }    
        
        public function destroy($id){
            $stament = $this->PDO->prepare("UPDATE cliente SET estado=0 WHERE id = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $id : false;
        } 
    }
*/
?>

<?php
    class clientModel{
        private $PDO;
        public function __construct(){
            require_once("c://xampp/htdocs/projectFact/config/db.php");
            $database = Database::getInstance();
            $this->PDO = $database->getConnection();
        }

        public function index(){
            $stament = $this->PDO->prepare("SELECT*FROM cliente WHERE estado=1");
            return($stament->execute()) ? $stament->fetchAll(): false;
        }
        
        public function show($id){
            $stament = $this->PDO->prepare("SELECT*FROM cliente WHERE id = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false;
        }

        public function store($nombre,$ruc,$telefono,$correo){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("INSERT INTO cliente VALUES(null,:nombre,:ruc,:telefono,:correo,1)");
                $stament->bindParam(":nombre",$nombre);
                $stament->bindParam(":ruc",$ruc);
                $stament->bindParam(":telefono",$telefono);
                $stament->bindParam(":correo",$correo);
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

        public function update($id,$nombre,$ruc,$telefono,$correo){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("UPDATE cliente SET nombre = :nombre, ruc = :ruc, telefono = :telefono, correo = :correo WHERE id = :id");
                $stament->bindParam(":nombre",$nombre);
                $stament->bindParam(":ruc",$ruc);
                $stament->bindParam(":telefono",$telefono);
                $stament->bindParam(":correo",$correo);
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
                $stament = $this->PDO->prepare("UPDATE cliente SET estado=0 WHERE id = :id");
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


