<?php 
    require_once("c://xampp/htdocs/projectFact/view/head/head.php");
    require_once("c://xampp/htdocs/projectFact/controller/categoriaController.php");
    $obj = new categoriaController();
    $user = $obj->show($_GET['id']);/*data*/
?>

    <div class="col-12 p-5">
        <h3 class="text-secondary">EDITAR CATEGORIA</h3>
        <form action="update.php" method="POST" autocomplete="off">
            <div class="mb-3" style="display: none;">
                <label for="id" class="form-label">Id:</label>
                <input readonly type="text" class="form-control" id="id" name="id" value="<?= $user[0] ?>">
            </div>
            <div class="mb-3">
                <label for="codigo" class="form-label">Codigo:</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value="<?= $user[1] ?>">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <input type="text" class="form-control" id="categoria" name="categoria" value="<?= $user[2] ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="aceptar" value="actualizar">Aceptar</button>
            <a href="/projectFact/view/categoria/mostrar.php" type="submit" class="btn btn-danger" name="cancelar" value="canok">Cancelar</a>
        </form>
    </div>

<?php 
    require_once("c://xampp/htdocs/projectFact/view/head/footer.php");
?>