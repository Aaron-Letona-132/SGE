function cerrarSession(){
    Swal.fire({
        title: 'Esta seguro de Cerrar su Sesión?',
        text: "Usted saldra del sistema",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
    }).then((result) => {
        if (result.isConfirmed) {
            //window.location="cerrarSession.php";
            window.location="../../controller/cerrarSesion.php";
        }
    });
}

function alertaError(titulo, texto){
    Swal.fire({
        title: titulo,
        text: texto,
        icon: 'error',
        cancelButtonColor: '#d33'
    });
}

function alertaDecision(mensaje, funcion){
    Swal.fire({
    title: "Desea Continuar?",
    text: mensaje,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!"
    }).then((result) => {
        if (result.isConfirmed) {
            funcion();
        }
    });
}

function alertaExitosa(titulo, mensaje, funcion){
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: 'success',
        cancelButtonColor: '#d33'
    }).then((result) => {
        funcion();
    });
}

function redireccionConValor(titulo, texto, idFactura){
    Swal.fire({
        title: titulo,
        text: texto,
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "imprimirFactura.php?dato=" + encodeURIComponent(idFactura)
        }else{
            location.reload();
        }
    });
}