
function cargarListado(){
    $.ajax({
        url:'../../controller/clase.php',
        type:'POST',
        data:{ cargarListado: codificar("cargarListado") },
        cache:false,
        success: function(respuesta){
            $("#divListadoClases").html(respuesta);
            fixedTableCompleto('dataTables-example');
        }
    });
}

function abrirModal(id, idGrado, nombre){
    $("#txtid").val("null");
    $("#idGrado").val("null"); 
    $("#nombre").val("");

    if (id !== "null"){
        $("#txtid").val(descodificar(id));
        $("#idGrado").val(descodificar(idGrado));
        $("#nombre").val(descodificar(nombre));
    }

    $('#modalClase').modal('show');
}

function cerrarModal(){
    $('#modalClase').modal('hide');
}

function Guardar(){
    id = $("#txtid").val();
    idGrado = $("#idGrado").val();
    nombre = $("#nombre").val();

    if(idGrado === "null"){
        alertaError('Ha ocurrido un error','Debe seleccionar un valor para Grado');
    }else if(nombre === ""){
        alertaError('Ha ocurrido un error','Debe ingresar un valor para el campo Clase');
    }else{
        $.ajax({
            url:'../../controller/clase.php',
            type:'POST',
            data:{
                datosClase: codificar("datosClase"),
                id: codificar(id),
                idGrado: codificar(idGrado),
                nombre: codificar(nombre)
            },
            cache:false,
            success: function(respuesta){
                if(respuesta.trim() == "1"){
                    $('#modalClase').modal('hide');
                    alertaExitosa('Exitoso','La clase se ha guardado exitosamente', cargarListado);
                }else if(respuesta.trim() == "2"){
                    alertaError('Duplicado','La clase ya existe en el mismo grado');
                }else{
                    alertaError('Ha ocurrido un error','Contacte a Soporte Técnico');
                }
            }
        });
    }
}

function eliminar(id){
    function ejecutar(){
        $.ajax({
            url:'../../controller/clase.php',
            type:'POST',
            data:{ 
                eliminar: codificar("eliminar"), 
                id: id
            },
            cache:false,
            success: function(respuesta){
                if($.trim(respuesta) == "1"){
                    alertaExitosa('Exitoso','La clase se ha eliminado correctamente', cargarListado);
                }else{
                    alertaError('Ha ocurrido un error','Contacte a Soporte Técnico');
                }
            }
        });
    }
    alertaDecision('¿Está seguro(a) que desea eliminar la clase?', ejecutar);
}
