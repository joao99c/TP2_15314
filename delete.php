<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-04-2018
 * Time: 11:37
 */

require_once "db.php";

$id = $_REQUEST['del'];

$sql= "DELETE FROM Utilizadores WHERE ID = :id";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':id',$id);

$result = $stmt->execute();

if (!$result){
    var_dump($stmt->errorInfo());
    exit;
}
else{
    header("Location: index.php");
}


