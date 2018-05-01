<?php

require_once "db.php";


var_dump($_POST);

//função test_input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$error = array();
if (!empty($_POST)) {

    //validações
    if (empty($_POST["nome"])) {
        array_push($error, "O nome é um campo obrigatório");
    } else {
        $nome = test_input($_POST["nome"]);
    }

    if (empty($_POST["email"]))
        array_push($error, "O email é um campo obrigatório");
    else {
        $email = test_input($_POST["email"]);
    }

    //Se forem uploaded files, são guardados
    if (!empty($_FILES['foto'])) {
        $path = "./uploads/";
        $path = $path . basename($_FILES['foto']['name']);
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $path)) {
            echo "A foto " . basename($_FILES['foto']['name']) . " foi submetido com sucesso!";
        } else {
            array_push($error, "A foto é um campo obrigatório");

        }

        $filename = basename($_FILES['foto']['name']);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

    }



//    $sql = "UPDATE Utilizadores set nome = :nome, email = :email, caminhoFoto = :foto, cargo = :cargo, status = :status  WHERE ID = :id";
    $sql = "UPDATE Utilizadores set nome = ?, email = ?, caminhoFoto = ?, cargo = ?, status = ?  WHERE ID = ?";
    try{

    $stmt = $PDO->prepare($sql);

    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $filename);
    $stmt->bindParam(4, $_POST['cargo']);
    $stmt->bindParam(5,$_POST['status']);
    $stmt->bindParam(6, $_POST['id']);



    $result = $stmt->execute();
    }
    catch (PDOException $e){
        print $e->getMessage();
    }
    header("Location: index.php");
}