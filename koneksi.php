<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','oto_mudiak');
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(mysqli_connect_errno()){
    echo"Gagal Connect Ke Server mysql". mysqli_conect_errno();
    die();
}
?>