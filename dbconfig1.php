<?php
try{
$pdo = new PDO("mysql:host=localhost; dbname=company","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

echo "Connection Done!";
}
catch(PDOException $e)
{
    echo "ERROR : Could Not Connect with Database".$e-getMessage();

}
?>