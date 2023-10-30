<?php
class loginSet
{
    private $PDO;
    public function __construct()
    {
        require_once("c://xampp/htdocs/projectFact/config/db.php");
        $database = Database::getInstance();
        $this->PDO = $database->getConnection();
    }
   
    public function logear($usuario, $pass)
    {
        if (isset($_SESSION['rol'])) {
            switch ($_SESSION['rol']) {
                case 1:
                    header("Location: ../../home.php");
                    break;
                case 2:
                    header("Location: ../../home.php");
                    break;
                default:
            }
        }
        session_start();
        $pass = md5($pass);
        $stament = $this->PDO->prepare("SELECT * FROM usuarios WHERE usuario_id = :usuario AND pass = :pass");
        $stament->bindParam(":usuario",$usuario);
        $stament->bindParam(":pass",$pass);
        $stament->execute();
        // $stament->execute(['usuario' => $usuario, 'pass' => $pass]);

        $row = $stament->fetch(PDO::FETCH_NUM);
        if ($row == true) {
            $rol = $row[4];
            $_SESSION['rol'] = $rol;

            $rol_cliente = $row[5];
            $_SESSION['rol_cliente'] = $rol_cliente;

            $rol_proveedor = $row[6];
            $_SESSION['rol_proveedor'] = $rol_proveedor;

            $rol_categorias = $row[7];
            $_SESSION['rol_categorias'] = $rol_categorias;
            
            $rol_productos = $row[8];
            $_SESSION['rol_productos'] = $rol_productos;

            $user = $row[1];
            $_SESSION['usuario'] = $user;

            switch ($_SESSION['rol']) {
                case 1:
                    header("Location: ../../home.php");
                    break;

                case 2:
                    header("Location: ../../home.php");
                    break;

                default:
            }
        } else {
            
            echo '<script>alert("Usuario o contraseña incorrectos."); window.location.href = "../../index.php";</script>';
               
        }
    }
}
