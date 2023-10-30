<?php
session_start();
if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1) {

    require_once("c://xampp/htdocs/projectFact/view/head/head.php");
    require_once("c://xampp/htdocs/projectFact/controller/userController.php");
    $obj = new userController();
    $data = $obj->index();
} else {
    echo '<script>alert("No tienes acceso.")';
}
?>


<div class="container-fluid px-4">
    <h3 class="mt-4 text-secondary">USUARIOS</h3>
    <a href="/projectFact/view/users/create.php" class="btn btn-success" style="margin: 15px 0;">Agregar Usuario</a>

    <div class="card mb-4">
        <div class="card-header">
            LISTA DE USUARIOS
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Rol</th>
                        <th>Acceso a Clientes</th>
                        <th>Acceso a Proveedores</th>
                        <th>Acceso a Categorias</th>
                        <th>Acceso a Productos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data) : ?>
                        <?php foreach ($data as $dt) : ?>
                            <tr>
                                <th><?= $dt[1] ?></th>
                                <th>
                                    <?php
                                    if ($dt[3] == 1) {
                                        echo '<span style="background: #54ca68;border-radius: 10px; padding: 7px; box-shadow: 3px 3px 10px 3px #8edc9c; color: #fff;">Activo</span>';
                                    } elseif ($dt[3] == 0) {
                                        echo '<span style="background: #ffa426;border-radius: 10px; padding: 5px; box-shadow: 3px 3px 10px 1px #ffc473; color: #fff;">Inactivo</span>';
                                    } else {
                                        echo 'Otro';
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if ($dt[4] == 1) {
                                        echo 'Administrador';
                                    } elseif ($dt[4] == 2) {
                                        echo 'Usuario';
                                    } else {
                                        echo 'Otro';
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if ($dt[5] == 1) {
                                        echo '<span style="color: #389522; font-weight: bold;">Permitido</span>';
                                    } elseif ($dt[4] == 2) {
                                        echo '<span style="color: #dc3545; font-weight: bold;">Denegado</span>';
                                    } else {
                                        echo 'Otro';
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if ($dt[6] == 1) {
                                        echo '<span style="color: #389522; font-weight: bold;">Permitido</span>';
                                    } elseif ($dt[4] == 2) {
                                        echo '<span style="color: #dc3545; font-weight: bold;">Denegado</span>';
                                    } else {
                                        echo 'Otro';
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if ($dt[7] == 1) {
                                        echo '<span style="color: #389522; font-weight: bold;">Permitido</span>';
                                    } elseif ($dt[4] == 2) {
                                        echo '<span style="color: #dc3545; font-weight: bold;">Denegado</span>';
                                    } else {
                                        echo 'Otro';
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if ($dt[8] == 1) {
                                        echo '<span style="color: #389522; font-weight: bold;">Permitido</span>';
                                    } elseif ($dt[4] == 2) {
                                        echo '<span style="color: #dc3545; font-weight: bold;">Denegado</span>';
                                    } else {
                                        echo 'Otro';
                                    }
                                    ?>
                                </th>
                                <th>
                                    <a href="edit.php?id=<?= $dt[0] ?>" class="btn btn-warning" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                    <a href="destroy.php?id=<?= $dt[0] ?>" class="btn btn-danger" title="Eliminar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                        </svg>
                                    </a>
                                    <a href="back.php?id=<?= $dt[0] ?>" class="btn btn-primary" title="Activar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                        <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                                        </svg>
                                    </a>
                                </th>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3">No hay registros</td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once("c://xampp/htdocs/projectFact/view/head/footer.php");
?>