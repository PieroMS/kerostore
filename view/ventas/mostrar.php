<?php
session_start();

if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1) {
    
    if ($_SESSION['rol'] == 1 || $_SESSION['rol_ventas'] == 1 ) {
        require_once("c://xampp/htdocs/projectFact/view/head/head.php");
        require_once("c://xampp/htdocs/projectFact/controller/ventaController.php");
        $objClient = new ventaController();
        $dataClient = $objClient->selectClient();
        $objProduct = new ventaController();
        $dataProduct = $objProduct->selectProduct();
        }
} else {
    echo '<script>alert("No tienes acceso.")';
}
?>
    <div class="col-12 p-5">
        <h3 class="text-secondary">AGREGAR VENTA</h3>
        <div class="border__box">
            <div class="col-12" style="margin: 0 0 2rem 0;">
                <label for="cliente" class="form-label">Cliente:</label>
                <select type="text" class="form-control form-select" id="cliente">
                    <option value="-1">Seleccionar Cliente</option>
                    <?php if ($dataClient): ?>
                        <?php foreach ($dataClient as $row): ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['nombre']; ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No hay categorías disponibles</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="content__flex">
                <div class="col-3">
                    <label for="producto" class="form-label">Producto:</label>
                    <select type="text" class="form-control form-select" id="producto">
                        <option value="-1">Seleccionar Producto</option>
                        <?php if ($dataProduct): ?>
                            <?php foreach ($dataProduct as $row): ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['nombre']; ?></option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No hay categorías disponibles</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="text" class="form-control" id="cantidad">
                </div>
                <div class="col-3">
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="text" class="form-control" id="precio">
                </div>
                <div style="margin: 2rem 0 0 0;">
                    <div class="btn btn-success" id="dataBtn">Aceptar</div>
                    <div class="btn btn-danger" id="cancelBtn">Cancelar</div>
                </div>
            </div>
        </div>
        <div class="border__box dataVenta" style="margin: 2rem 0 0 0;">
            <form action="store.php" method="POST">
                <div>
                    Cliente -> <span id="clienteShow"></span>
                    <input type="text" name="cliente" id="iptCliente" style="display: none;">
                </div>
                <div>
                    Producto -> <span id="productoShow"></span>
                    <input type="text" name="producto" id="iptProducto" style="display: none;">
                </div>
                <div>
                    Cantidad -> <span id="cantidadShow"></span>
                    <input type="text" name="cantidad" id="iptCantidad" style="display: none;">
                </div>
                <div>
                    Precio -> <span id="precioShow"></span>
                    <input type="text" name="precio" id="iptPrecio" style="display: none;">
                </div>
                <div>
                    Importe -> <span id="importeShow"></span>
                    <input type="text" name="importe" id="iptImporte" style="display: none;">
                </div>
                <div>
                    IGV -> <span id="igvShow"></span>
                    <input type="text" name="igv" id="iptIgv" style="display: none;">
                </div>
                <div style="margin: 0 0 1rem 0;">
                    Total -> <span id="totalShow"></span>
                    <input type="text" name="total" id="iptTotal" style="display: none;">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="aceptar" value="ok">Agregar Venta</button>
                    <a href="/projectFact/view/ventas/mostrar.php" type="submit" class="btn btn-danger" name="cancelar" value="canok">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

<?php 
    require_once("c://xampp/htdocs/projectFact/view/head/footer.php");
?>