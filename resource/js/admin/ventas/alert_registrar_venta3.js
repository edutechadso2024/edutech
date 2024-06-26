document.addEventListener('DOMContentLoaded', function () {
    // ... (tu código anterior)

    // Función para enviar los datos del formulario y los detalles de venta al controlador
    // Función para enviar los datos del formulario y los detalles de venta al controlador
    function enviarVentaAlControlador() {
        // Obtener el formulario por su ID
        var formulario = document.getElementById('form-venta');
        // Convertir detallesVenta a una cadena JSON
        var detallesVentaJSON = JSON.stringify(detallesVenta);

        // Asignar el valor al campo oculto
        document.getElementById("detallesVentaInput").value = detallesVentaJSON;

        // Verificar si el formulario es válido antes de enviarlo
        if (formulario.checkValidity()) {
            detallesVenta = []; // Limpiar los detalles de venta aquí
            console.log("si se envia el form y funciona el enviar venta")
            // Limpiar la tabla HTML en la vista principal
            var tablaDetalles = document.getElementById('tabla-detalles').getElementsByTagName('tbody')[0];
            tablaDetalles.innerHTML = '';  // Elimina todas las filas de la tabla
            localStorage.removeItem('detallesVenta');
            formulario.submit();

        } else {
            // El formulario no es válido, mostrar mensajes de validación HTML5
            mostrarMensajesValidacionHTML(formulario);
        }
    }

    // Función para mostrar mensajes de validación HTML5
    function mostrarMensajesValidacionHTML(formulario) {
        var camposInvalidos = formulario.querySelectorAll(':invalid');

        // Iterar sobre los campos inválidos y mostrar mensajes de validación predeterminados
        camposInvalidos.forEach(function (campo) {
            var mensajeError = campo.validationMessage;
            Swal.fire({
                title: "¡Error!",
                text: mensajeError,
                icon: "error"
            });
        });
    }

    // Agregar el evento de clic al botón de registro
    document.getElementById('btn-regventa').addEventListener('click', function () {
        // Validar si los campos del formulario están llenos
        var nombres = document.getElementById("nombres").value;
        var dni = document.getElementById("dni_input").value;
        var correo = document.getElementById("correo").value;
        var ciudad = document.getElementById("ciudad").value;
        var apellidos = document.getElementById("apellidos").value;
        var telefono = document.getElementById("telefono").value;
        var descuento = document.getElementById("descuento").value;
        var valorTotal = document.getElementById("valor-total").value;
        var valorAbonado = document.getElementById("valor-abonado").value;
        valorAbonado = parseInt(valorAbonado);
        valorTotal = parseFloat(valorTotal);
        if (!nombres || !dni || !correo || !ciudad || !apellidos || !telefono || !valorTotal) {
            Swal.fire({
                title: "¡Error 1 !",
                text: "Para registrar la venta, debe completar todos los campos del formulario.",
                icon: "error"
            });
            return; // Salir de la función si hay campos vacíos
        }

        // Validar si el array detallesVenta tiene al menos un elemento
        else if (detallesVenta.length === 0) {
            Swal.fire({
                title: "¡Error!",
                text: "No hay detalles de venta para registrar 0.",
                icon: "error"
            });
            return; // Salir de la función si no hay detalles de venta
        } else if (valorAbonado > valorTotal) {
            console.log(valorAbonado, valorTotal)
            Swal.fire({
                title: "¡Error!",
                text: "El valor abonado no puede ser mayor al valor total.",
                icon: "error"
            });
            return; // Salir de la función si no hay detalles de venta
        }

        // Aquí puedes agregar la lógica para enviar los datos de la venta a la base de datos
        Swal.fire({
            title: "¿Estás seguro de registrar la venta?",
            text: "Este proceso registrará la venta en la base de datos.",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Registrar Venta"
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar los datos del formulario y los detalles de venta al controlador
                enviarVentaAlControlador();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "Acción cancelada",
                    text: "La acción de registrar la venta ha sido cancelada.",
                    icon: "info"
                });
            }
        });
    });
});
