<?php 

    function errorSinDatos(){
        return "<script> alertaError('Error','No hay datos por mostrar'); </script>";
    }

    function sendEmail($email, $title, $body) {
    
        $emailServiceUrl = "https://aaronletona.com/wsPhp/wsEnvioCorreo/ws/enviarCorreo";
        
        $emailData = [
            "email" => $email,
            "titulo" => $title,
            "body" => $body
        ];

        $ch = curl_init($emailServiceUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($emailData));
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        return $httpCode;
        
    }

?>