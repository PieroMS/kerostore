

<?php
    class userModel{
        private $PDO;
        public function __construct(){
            require_once("c://xampp/htdocs/projectFact/config/db.php");
            $database = Database::getInstance();
            $this->PDO = $database->getConnection();
        }

        public function index(){
            $stament = $this->PDO->prepare("SELECT*FROM usuarios");
            return($stament->execute()) ? $stament->fetchAll(): false;
        }
        
        public function show($id){
            $stament = $this->PDO->prepare("SELECT*FROM usuarios WHERE id = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false;
        }

        public function storeUserData($ruc,$nombre,$direccion,$telefono){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("INSERT INTO usuarios_data(id,ruc,nombre,direccion,telefono) VALUES(null,:ruc,:nombre,:direccion,:telefono)");
                $stament->bindParam(":ruc",$ruc);
                $stament->bindParam(":nombre",$nombre);
                $stament->bindParam(":direccion",$direccion);
                $stament->bindParam(":telefono",$telefono);
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

        public function storeUser($usuario,$pass,$rol,$rol_cliente,$rol_proveedor,$rol_categorias,$rol_productos){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $passContra = md5($pass);
                $stament = $this->PDO->prepare("INSERT INTO usuarios VALUES(null,:usuario_id,:pass,1,:rol,:rol_cliente,:rol_proveedor,:rol_categorias,:rol_productos)");
                $stament->bindParam(":usuario_id",$usuario);
                $stament->bindParam(":pass",$passContra);
                $stament->bindParam(":rol",$rol);
                $stament->bindParam(":rol_cliente",$rol_cliente);
                $stament->bindParam(":rol_proveedor",$rol_proveedor);
                $stament->bindParam(":rol_categorias",$rol_categorias);
                $stament->bindParam(":rol_productos",$rol_productos);
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

        public function update($id,$rol,$rol_cliente,$rol_proveedor,$rol_categorias,$rol_productos){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("UPDATE usuarios SET rol = :rol, rol_cliente = :rol_cliente, rol_proveedor = :rol_proveedor, rol_categorias = :rol_categorias, rol_productos = :rol_productos WHERE id = :id");
                $stament->bindParam(":rol",$rol);
                $stament->bindParam(":rol_cliente",$rol_cliente);
                $stament->bindParam(":rol_proveedor",$rol_proveedor);
                $stament->bindParam(":rol_categorias",$rol_categorias);
                $stament->bindParam(":rol_productos",$rol_productos);
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

        public function destroyUser($id){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("UPDATE usuarios SET estado=0 WHERE id = :id");
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

        public function back($id){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("UPDATE usuarios SET estado=1 WHERE id = :id");
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


