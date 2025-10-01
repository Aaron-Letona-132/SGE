
function cargarListado(){
    $.ajax({
        url:'../../controller/horario.php',
        type:'POST',
        data:{ cargarListado: codificar("cargarListado") },
        cache:false,
        success: function(respuesta){
            $("#divListadoHorarios").html(respuesta);
            fixedTableCompleto('dataTables-example');
        }
    });
}

function abrirModal(id, hInicio, hFin, dia){
    $("#txtid").val("null");
    $("#hInicio").val("");
    $("#hFin").val("");
    $("#dia").val("1");

    if (id !== "null"){
        $("#txtid").val(descodificar(id));
        $("#hInicio").val(descodificar(hInicio));
        $("#hFin").val(descodificar(hFin));
        $("#dia").val(descodificar(dia));
    }
    $('#modalHorario').modal('show');
}

function cerrarModal(){
    $('#modalHorario').modal('hide');
}

function Guardar(){
    let id     = $("#txtid").val();
    let hIni   = $("#hInicio").val();
    let hFin   = $("#hFin").val();
    let dia    = $("#dia").val();

    if(!hIni){
        alertaError('Ha ocurrido un error','Debe ingresar un valor para Hora Inicio');
    }else if(!hFin){
        alertaError('Ha ocurrido un error','Debe ingresar un valor para Hora Fin');
    }else if(hIni >= hFin){
        alertaError('Ha ocurrido un error','La Hora Inicio debe ser menor que la Hora Fin');
    }else if(!dia || parseInt(dia) < 1 || parseInt(dia) > 7){
        alertaError('Ha ocurrido un error','El campo Día debe estar entre 1 y 7');
    }else{
        $.ajax({
            url:'../../controller/horario.php',
            type:'POST',
            data:{
                datosHorario: codificar("datosHorario"),
                id: codificar(id),
                hInicio: codificar(hIni),
                hFin: codificar(hFin),
                dia: codificar(dia)
            },
            cache:false,
            success: function(respuesta){
                if(respuesta.trim() == "1"){
                    $('#modalHorario').modal('hide');
                    alertaExitosa('Exitoso','El horario se ha guardado exitosamente', cargarListado);
                }else if(respuesta.trim() == "2"){
                    alertaError('Duplicado','Ya existe un horario con la misma franja y día');
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
            url:'../../controller/horario.php',
            type:'POST',
            data:{ 
                eliminar: codificar("eliminar"), 
                id: id 
            },
            cache:false,
            success: function(respuesta){
                if($.trim(respuesta) == "1"){
                    alertaExitosa('Exitoso','El horario se ha eliminado correctamente', cargarListado);
                }else{
                    alertaError('Ha ocurrido un error','Contacte a Soporte Técnico');
                }
            }
        });
    }
    alertaDecision('¿Está seguro(a) que desea eliminar el horario?', ejecutar);
}
