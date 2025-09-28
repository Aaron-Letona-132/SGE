function validarLogin() {

    correo = $('#correo').val();
    password = $('#password').val();

    if ( correo == "" ) {
        alertaError('A Ocurrido un Error', 'debe ingresar un dato para el campo correo');
    } else if ( password == "" ) {
        alertaError('A Ocurrido un Error', 'debe ingresar un dato para el campo contraseña');
    } else {

        $.ajax({
            url:'controller/login.php',
            type:'POST',
            data: {
                loginValidar:codificar("loginValidar"),
                correo:codificar(correo),
                password:codificar(password)
            },
            cache:false,
            success: function(respuesta){
                if(respuesta.trim() == "1"){
                    window.location="/SGE/view/administracion/home.php";
                }else if(respuesta.trim() == "2"){
                    alertaError("Correo Invalido", "El correo o contraseño que ingreso son incorrectos");
                }else{
                    alertaError("Ha Ocurrido un Error", "Comuniquese con soporte tecnico.");
                }
            }
        });

    }

    return false;
}

function recoveryPassword() {

    correo = $('#correo').val();

    if ( correo == "" ) {
        alertaError('A Ocurrido un Error', 'debe ingresar un dato para el campo correo');
    } else {

        $.ajax({
            url:'controller/login.php',
            type:'POST',
            data: {
                recoveryPassword:codificar("recoveryPassword"),
                correo:codificar(correo)
            },
            cache:false,
            success: function(respuesta){
                if(respuesta.trim() == "1"){
                    alertaError("Envio Exitoso", "Contraseña enviada al correo ingresado, favor de validar tu correo electronico.");
                }else{
                    alertaError("Ha Ocurrido un Error", "Comuniquese con soporte Tecnico");
                }
            }
        });

    }

    return false;
}