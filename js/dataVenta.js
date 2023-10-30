(function(){
    const dataBtn = document.querySelector('#dataBtn');
    dataBtn.addEventListener('click', () => {
        const iptCliente = document.querySelector('#iptCliente');
        const cliente = document.querySelector('#cliente');
        const clienteOption = cliente.options[cliente.selectedIndex];
        const clienteValor = clienteOption.textContent;
        const clienteShow = document.querySelector('#clienteShow');
        clienteShow.textContent = clienteValor;
        iptCliente.value = clienteShow.textContent;
        if(clienteShow.textContent == 'Seleccionar Cliente'){
            alert('Debe Seleccionar un cliente');
            clienteShow.textContent = '';
        }
        
        const iptProducto = document.querySelector('#iptProducto');
        const producto = document.querySelector('#producto');
        const productoOption = producto.options[producto.selectedIndex];
        const productoValor = productoOption.textContent;
        const productoShow = document.querySelector('#productoShow');
        productoShow.textContent = productoValor;
        iptProducto.value = productoShow.textContent;
        if(productoShow.textContent == 'Seleccionar Producto'){
            alert('Debe Seleccionar un producto');
            productoShow.textContent = '';
        }

        const cantidad = document.querySelector('#cantidad').value;
        if(cantidad!=''){
            const iptCantidad = document.querySelector('#iptCantidad');
            const cantidadShow = document.querySelector('#cantidadShow');
            cantidadShow.textContent = cantidad;
            iptCantidad.value = cantidadShow.textContent
        } else{
            alert('Debe ingresar la Cantidad');
            cantidadShow.textContent = '';
        }
        

        const precio = document.querySelector('#precio').value; 
        if(precio!=''){
            const iptPrecio = document.querySelector('#iptPrecio');
            const precioShow = document.querySelector('#precioShow');
            precioShow.textContent = precio;
            iptPrecio.value = precioShow.textContent;
        }else{
            alert('Debe ingresar el Precio');
            precioShow.textContent = '';
        }

        const importe = cantidad*precio;
        const iptImporte = document.querySelector('#iptImporte');
        const importeShow = document.querySelector('#importeShow');
        importeShow.textContent = importe;
        iptImporte.value = importeShow.textContent;

        const igv = importe*0.18;
        const iptIgv = document.querySelector('#iptIgv');
        const igvShow = document.querySelector('#igvShow');
        igvShow.textContent = igv;
        iptIgv.value = igvShow.textContent;

        const total = importe + igv;
        const iptTotal = document.querySelector('#iptTotal');
        const totalShow = document.querySelector('#totalShow');
        totalShow.textContent = total;
        iptTotal.value = totalShow.textContent;
    });
    const cancelBtn = document.querySelector('#cancelBtn');
    cancelBtn.addEventListener('click', () => {
        document.querySelector('#cliente').value='0';
        document.querySelector('#producto').value='0';
        document.querySelector('#cantidad').value='';
        document.querySelector('#precio').value=''; 
    });
})();