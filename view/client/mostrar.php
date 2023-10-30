<?php
session_start();
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['rol'] == 1 || $_SESSION['rol_cliente'] == 1) {
        require_once("c://xampp/htdocs/projectFact/view/head/head.php");
        require_once("c://xampp/htdocs/projectFact/controller/clientController.php");
        $obj = new clientController();
        $data = $obj->index();
    } else {
        echo '<script>alert("No tienes acceso.")';
    }
}
?>

<div class="container-fluid px-4">
    <h3 class="mt-4 text-secondary">CLIENTES</h3>
    <a href="/projectFact/view/client/create.php" class="btn btn-success" style="margin: 15px 0;">Agregar Cliente</a>
    <a href="/projectFact/view/client/reporte.php" class="btn btn-danger" style="margin: 15px 0;">PDF</a>
    <div class="card mb-4">
        <div class="card-header">
            LISTA DE CLIENTES
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>RUC</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data) : ?>
                        <?php foreach ($data as $dt) : ?>
                            <tr>
                                <th><?= $dt[1] ?></th>
                                <th><?= $dt[2] ?></th>
                                <th><?= $dt[3] ?></th>
                                <th><?= $dt[4] ?></th>
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
            <div id="top_x_div" style="width: 900px; height: 500px;"></div>
        </div>
    </div>
</div>

<?php
$comienzanCon1 = 0;
$comienzanCon2 = 0;

if ($data) {
    foreach ($data as $dt) {
        $ruc = $dt[2]; // Suponiendo que $dt[2] contiene el RUC
        $primerDigito = substr($ruc, 0, 1);

        if ($primerDigito === '1') {
            $comienzanCon1++;
        } elseif ($primerDigito === '2') {
            $comienzanCon2++;
        }
    }
}

?>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    // Count the total number of clients
    var juridicClientsCount = <?php echo $comienzanCon2; ?>;
    var naturalClientsCount = <?php echo $comienzanCon1; ?>;

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Clientes', 'Porcentaje'],
            ["Clientes de tipo persona juridica", juridicClientsCount],
            ["Clientes de tipo persona natural", naturalClientsCount],
        ]);

        var options = {
            title: '',
            width: 900,
            legend: { position: 'none' },
            chart: { title: 'Grafica de clientes', subtitle: '' },
            bars: 'horizontal',
            axes: {
                x: {
                    0: { side: 'top', label: 'Percentage' }
                }
            },
            bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
    }
</script>

<?php
require_once("c://xampp/htdocs/projectFact/view/head/footer.php");
?>
