function cargarListado(){
    $.ajax({
        url:'../../controller/usuario.php',
        type:'POST',
        data:{
            cargarListado: codificar("cargarListado")
        },
        cache:false,
        success: function(respuesta){
            $("#divListadoUsuarios").html(respuesta);
            fixedTableCompleto('dataTables-example');
        }
    });
}

function abrirModal(id, idPra) {
    $("#txtid").val("null");
    $("#idPra").val("null");
    $("#password").val("");

    $('#modalUsuario').modal('show');
}

function cerrarModal() {
    $('#modalUsuario').modal('hide');
}

function Guardar(){

    id = $("#txtid").val();
    idPra = $("#idPra").val();
    password = $("#password").val();

    if(idPra == "null"){
        alertaError('A Ocurrido un Error', 'debe seleccionar una persona');
    }else if(password == "null"){
        alertaError('A Ocurrido un Error', 'debe ingresar un password');
    }else if(!validarFormatoContrasena(password)){
        alertaError('A Ocurrido un Error', 'La contraseña ingresada debe ser mas segura');
    }else{

        $.ajax({
            url:'../../controller/usuario.php',
            type:'POST',
            data:{
                datosUsuario: codificar("datosUsuario"),
                id: codificar(id),
                idPra: codificar(idPra),
                password: codificar(password)
            },
            cache:false,
            success: function(respuesta){
                if( respuesta.trim() == 1){
                    $('#modalUsuario').modal('hide');
                    alertaExitosa('Exitoso','El usuario se ha ingresado exitosamente', cargarListado);
                }else if( respuesta.trim() == 2){
                    alertaError('A Ocurrido un Error', 'El Usuario que intenta ingresar ya existe en el sistema');
                }else{
                    alertaError('A Ocurrido un Error', 'Contacte a Soporte Tecnico');
                }
            }
        });
        
    }

}

function eliminar(id){
    function ejecutarEliminacion(){

        $.ajax({
            url:'../../controller/usuario.php',
            type:'POST',
            data:{
                eliminar: codificar("eliminar"),
                id: id
            },
            cache:false,
            success: function(respuesta){
                if( respuesta.trim() == 1){
                    alertaExitosa('Exitoso','El usuario se ha eliminado exitosamente', cargarListado);
                }else{
                    alertaError('A Ocurrido un Error', 'Contacte a Soporte Tecnico');
                }
            }
        });

    }
    alertaDecision('Esta seguro(a) que desea eliminar el usuario?', ejecutarEliminacion);
}