<?php
$host = "localhost";
$user = "root";
$pass = "$27@04&95";
$db = "kontakti";

$connection = mysqli_connect($host, $user, $pass, $db);

if (!$connection) {
    die("Falha na conexão: " . mysqli_errno());
} else {
    // echo "Conexão realizada com sucesso!"
}