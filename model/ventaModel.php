<?php
    class ventaModel{
        private $PDO;
        public function __construct(){
            require_once("c://xampp/htdocs/projectFact/config/db.php");
            $database = Database::getInstance();
            $this->PDO = $database->getConnection();
        }

        public function selectClient(){
            $stament = $this->PDO->prepare("SELECT id, nombre FROM cliente WHERE estado=1");
            return($stament->execute()) ? $stament->fetchAll(PDO::FETCH_ASSOC): false;
        }

        public function selectProduct(){
            $stament = $this->PDO->prepare("SELECT id, nombre FROM producto WHERE estado=1");
            return($stament->execute()) ? $stament->fetchAll(PDO::FETCH_ASSOC): false;
        }

        public function index(){
            $stament = $this->PDO->prepare("SELECT*FROM factura WHERE estado=1");
            return($stament->execute()) ? $stament->fetchAll(): false;
        }
        
        public function show($id){
            $stament = $this->PDO->prepare("SELECT*FROM proveedores WHERE id = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false;
        }
        
        public function store($cliente,$producto,$cantidad,$precio,$importe,$igv,$total){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("INSERT INTO factura(id,cliente,producto,cantidad,precio,importe,igv,total,estado) VALUES(null,:cliente,:producto,:cantidad,:precio,:importe,:igv,:total,1)");
                $stament->bindParam(":cliente",$cliente);
                $stament->bindParam(":producto",$producto);
                $stament->bindParam(":cantidad",$cantidad);
                $stament->bindParam(":precio",$precio);
                $stament->bindParam(":importe",$importe);
                $stament->bindParam(":igv",$igv);
                $stament->bindParam(":total",$total);
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
        
        public function destroy($id){
            try{
                // Inicia una transacción
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("UPDATE factura SET estado=0 WHERE id = :id");
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
