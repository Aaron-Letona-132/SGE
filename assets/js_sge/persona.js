function cargarListado(){
    $.ajax({
        url:'../../controller/persona.php',
        type:'POST',
        data:{
            cargarListado: codificar("cargarListado")
        },
        cache:false,
        success: function(respuesta){
            $("#divListadoPersonas").html(respuesta);
            fixedTableCompleto('dataTables-example');
        }
    });
}

function abrirModal(id, idRol, prNombre, seNombre, cui, telefono, direccion, correo, fechaNac, genero, condEspecial) {
    $("#txtid").val("null");
    $("#rol").val("null");
    $("#nombre").val("");
    $("#apellido").val("");
    $("#cui").val("");
    $("#telefono").val("");
    $("#direccion").val("");
    $("#fechaNac").val("");
    $("#genero").val("");
    $("#condicionEsp").val("");
    $("#correo").val("");

    if (id != "null") {

        $("#txtid").val(descodificar(id));
        $("#rol").val(descodificar(idRol));
        $("#nombre").val(descodificar(prNombre));
        $("#apellido").val(descodificar(seNombre));
        $("#cui").val(descodificar(cui));
        $("#telefono").val(descodificar(telefono));
        $("#direccion").val(descodificar(direccion));
        $("#fechaNac").val(descodificar(fechaNac));
        $("#genero").val(descodificar(genero));
        $("#condicionEsp").val(descodificar(condEspecial));
        $("#correo").val(descodificar(correo));

    }

    $('#modalPersona').modal('show');
}

function cerrarModal() {
    $('#modalPersona').modal('hide');
}

function Guardar(){

    id = $("#txtid").val();
    rol = $("#rol").val();
    nombre = $("#nombre").val();
    apellido = $("#apellido").val();
    cui = $("#cui").val();
    telefono = $("#telefono").val();
    direccion = $("#direccion").val();
    fechaNac = $("#fechaNac").val();
    genero = $("#genero").val();
    condicion = $("#condicionEsp").val();
    correo = $("#correo").val();

    if(rol == ""){
        alertaError('A Ocurrido un Error', 'debe ingresar un valor para el campo Nombre Rol');
    }else if(rol == "null"){
        alertaError('A Ocurrido un Error', 'debe seleccionar un rol');
    }else if(nombre == ""){
        alertaError('A Ocurrido un Error', 'debe ingresar un valor para el campo Nombres');
    }else if(apellido == ""){
        alertaError('A Ocurrido un Error', 'debe ingresar un valor para el campo Apellidos');
    }else if(cui == ""){
        alertaError('A Ocurrido un Error', 'debe ingresar un valor para el campo CUI');
    }else if(telefono == ""){
        alertaError('A Ocurrido un Error', 'debe ingresar un valor para el campo Telefono');
    }else if(!esTelefono(telefono)){
        alertaError('A Ocurrido un Error', 'El dato ingresado no es valido para Telefono');
    }else if(!validarTelefonoGt(telefono)){
        alertaError('A Ocurrido un Error', 'El telefono ingresado no es de Guatemala');
    }else if(direccion == ""){
        alertaError('A Ocurrido un Error', 'debe ingresar un valor para el campo Direccion');
    }else if(fechaNac == ""){
        alertaError('A Ocurrido un Error', 'debe ingresar un valor para el campo Fecha Nacimiento');
    }else if(genero == ""){
        alertaError('A Ocurrido un Error', 'debe ingresar un valor para el campo Genero');
    }else if(condicion == ""){
        alertaError('A Ocurrido un Error', 'debe ingresar un valor para el campo Condicion Especial');
    }else if(correo == ""){
        alertaError('A Ocurrido un Error', 'debe ingresar un valor para el campo Correo');
    }else if(!esCorreo(correo)){
        alertaError('A Ocurrido un Error', 'El dato ingresado no es un correo electronico valido');
    }else{

        $.ajax({
            url:'../../controller/persona.php',
            type:'POST',
            data:{
                datosUsuario: codificar("datosUsuario"),
                id: codificar(id),
                rol: codificar(rol),
                nombre: codificar(nombre),
                apellido: codificar(apellido),
                cui: codificar(cui),
                telefono: codificar(telefono),
                direccion: codificar(direccion),
                fechaNac: codificar(fechaNac),
                genero: codificar(genero),
                condicion: codificar(condicion),
                correo: codificar(correo)
            },
            cache:false,
            success: function(respuesta){
                if( respuesta.trim() == 1){
                    $('#modalPersona').modal('hide');
                    alertaExitosa('Exitoso','La persona se ha ingresado exitosamente', cargarListado);
                }else if( respuesta.trim() == 2){
                    alertaError('A Ocurrido un Error', 'La persona que intenta ingresar ya existe en el sistema');
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
            url:'../../controller/persona.php',
            type:'POST',
            data:{
                eliminar: codificar("eliminar"),
                id: id
            },
            cache:false,
            success: function(respuesta){
                if( respuesta.trim() == 1){
                    alertaExitosa('Exitoso','La persona se ha eliminado exitosamente', cargarListado);
                }else{
                    alertaError('A Ocurrido un Error', 'Contacte a Soporte Tecnico');
                }
            }
        });

    }
    alertaDecision('Esta seguro(a) que desea eliminar a la persona?', ejecutarEliminacion);
}