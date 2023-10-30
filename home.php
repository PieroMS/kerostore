<?php 
    session_start();
    
    if(isset($_SESSION['usuario']) ){
    require_once("c://xampp/htdocs/projectFact/view/head/head.php");
?>

<h1 class="text-center">Bienvenido...</h1>

<?php 
    require_once("c://xampp/htdocs/projectFact/view/head/footer.php");
    }else{
        header('Location: index.php');
    }
?>

