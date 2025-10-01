
function cargarListado(){
    $.ajax({
        url:'../../controller/nivelacademico.php',
        type:'POST',
        data:{ cargarListado: codificar("cargarListado") },
        cache:false,
        success: function(respuesta){
            $("#divListadoNiveles").html(respuesta);
            fixedTableCompleto('dataTables-example');
        }
    });
}

function abrirModal(id, nombre){
    $("#txtid").val("null");
    $("#nombreNivel").val("");

    if (id !== "null"){
        $("#txtid").val(descodificar(id));
        $("#nombreNivel").val(descodificar(nombre));
    }
    $('#modalNivel').modal('show');
}

function cerrarModal(){
    $('#modalNivel').modal('hide');
}

function Guardar(){
    let id     = $("#txtid").val();
    let nombre = $("#nombreNivel").val();

    if(nombre === ""){
        alertaError('Ha ocurrido un error','Debe ingresar un valor para el campo Nivel Académico');
    }else{
        $.ajax({
            url:'../../controller/nivelacademico.php',
            type:'POST',
            data:{
                datosNivel: codificar("datosNivel"),
                id: codificar(id),
                nombre: codificar(nombre)
            },
            cache:false,
            success: function(respuesta){
                if(respuesta.trim() == "1"){
                    $('#modalNivel').modal('hide');
                    alertaExitosa('Exitoso','El nivel académico se ha guardado exitosamente', cargarListado);
                }else if(respuesta.trim() == "2"){
                    alertaError('Duplicado','El nivel académico que intenta ingresar ya existe');
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
            url:'../../controller/nivelacademico.php',
            type:'POST',
            data:{ 
                eliminar: codificar("eliminar"), 
                id: id 
            },
            cache:false,
            success: function(respuesta){
                if($.trim(respuesta) == "1"){
                    alertaExitosa('Exitoso','El nivel académico se ha eliminado correctamente', cargarListado);
                }else{
                    alertaError('Ha ocurrido un error','Contacte a Soporte Técnico');
                }
            }
        });
    }
    alertaDecision('¿Está seguro(a) que desea eliminar el nivel académico?', ejecutar);
}
