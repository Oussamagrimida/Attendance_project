<?php
    // Development Connection
     $host = '127.0.0.1';
     $db = 'projectphp';
     $dbuser = 'root';
     $pass = '';
     $charset = 'utf8mb4';


// Remote database connection
/*$host='sql7.freesqldatabase.com';
$db='sql7790035';
$dbuser='sql7790035';
$pass='Gei1Xd94Aw';
$charset='utf8mb4';*/

$dsn="mysql:host=$host;dbname=$db;charset=$charset";

try{
    $pdo= new PDO($dsn,$dbuser,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    throw new PDOException($e->getMessage());
}

require_once 'crud.php';
require_once 'user.php';

$crud = new crud($pdo);
$user = new user($pdo);

$user->insertUser("admin","password");
?>


