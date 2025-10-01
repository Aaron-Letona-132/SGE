
function cargarListado(){
    $.ajax({
        url:'../../controller/grado.php',
        type:'POST',
        data:{ cargarListado: codificar("cargarListado") },
        cache:false,
        success: function(respuesta){
            $("#divListadoGrados").html(respuesta);
            fixedTableCompleto('dataTables-example');
        }
    });
}

function abrirModal(id, idNivel, nombre){
    $("#txtid").val("null");
    $("#idNivel").val("null");
    $("#nombreGrado").val("");

    if (id !== "null"){
        $("#txtid").val(descodificar(id));
        $("#idNivel").val(descodificar(idNivel));
        $("#nombreGrado").val(descodificar(nombre));
    }
    $('#modalGrado').modal('show');
}

function cerrarModal(){
    $('#modalGrado').modal('hide');
}

function Guardar(){
    let id      = $("#txtid").val();
    let idNivel = $("#idNivel").val();
    let nombre  = $("#nombreGrado").val();

    if(idNivel === "null"){
        alertaError('Ha ocurrido un error','Debe seleccionar un nivel académico');
    }else if(nombre === ""){
        alertaError('Ha ocurrido un error','Debe ingresar un valor para el campo Grado');
    }else{
        $.ajax({
            url:'../../controller/grado.php',
            type:'POST',
            data:{
                datosGrado: codificar("datosGrado"),
                id: codificar(id),
                idNivel: codificar(idNivel),
                nombre: codificar(nombre)
            },
            cache:false,
            success: function(respuesta){

                if(respuesta.trim() == "1"){
                    $('#modalGrado').modal('hide');
                    alertaExitosa('Exitoso','El grado se ha guardado exitosamente', cargarListado);
                }else if(respuesta.trim() == "2"){
                    alertaError('Duplicado','El grado que intenta ingresar ya existe en el mismo nivel');
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
            url:'../../controller/grado.php',
            type:'POST',
            data:{ 
                eliminar: codificar("eliminar"), 
                id: id 
            },
            cache:false,
            success: function(respuesta){
                if($.trim(respuesta) == "1"){
                    alertaExitosa('Exitoso','El grado se elimino correctamente', cargarListado);
                }else{
                    alertaError('Ha ocurrido un error','Contacte a Soporte Técnico');
                }
            }
        });
    }
    alertaDecision('¿Está seguro(a) que desea eliminar el grado?', ejecutar);
}
