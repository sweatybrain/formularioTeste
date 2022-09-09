<?php 


$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "tut";


try {
    $db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e) {
    
    die('Não foi possível conectar-se ao banco de dados');
}


