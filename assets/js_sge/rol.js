function cargarListadoRoles(){
    $.ajax({
        url:'../../controller/rol.php',
        type:'POST',
        data:{
            cargarListadoRol: codificar("cargarListadoRol")
        },
        cache:false,
        success: function(respuesta){
            $("#divListadoRoles").html(respuesta);
            fixedTableCompleto('dataTables-example');
        }
    });
}

function abrirModal(id, nombre) {
    $("#txtid").val("null");
    $("#rol").val("");

    if (id != "null") {

        $("#txtid").val(descodificar(id));
        $("#rol").val(descodificar(nombre));

    }

    $('#modalRol').modal('show');
}

function cerrarModal() {
    $('#modalRol').modal('hide');
}

function Guardar(){

    id = $("#txtid").val();
    rol = $("#rol").val();

    if(rol == ""){
        alertaError('A Ocurrido un Error', 'debe ingresar un valor para el campo Nombre Rol');
    }else{

        $.ajax({
            url:'../../controller/rol.php',
            type:'POST',
            data:{
                datosUsuario: codificar("datosUsuario"),
                id: codificar(id),
                rol: codificar(rol)
            },
            cache:false,
            success: function(respuesta){
                if( respuesta.trim() == 1){
                    $('#modalRol').modal('hide');
                    alertaExitosa('Exitoso','El Rol se ha ingresado exitosamente', cargarListadoRoles);
                }else if( respuesta.trim() == 2){
                    alertaError('A Ocurrido un Error', 'El Rol que intenta ingresar ya existe en el sistema');
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
            url:'../../controller/rol.php',
            type:'POST',
            data:{
                eliminar: codificar("eliminar"),
                id: id
            },
            cache:false,
            success: function(respuesta){
                if( respuesta.trim() == 1){
                    alertaExitosa('Exitoso','El Rol se ha eliminado exitosamente', cargarListadoRoles);
                }else{
                    alertaError('A Ocurrido un Error', 'Contacte a Soporte Tecnico');
                }
            }
        });

    }
    alertaDecision('Esta seguro(a) que desea eliminar el Rol?', ejecutarEliminacion);
}