<?php

require_once "db.php";

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
    if (empty($_POST["email"])) {
        array_push($error, "O email é um campo obrigatório");
    } else {
        $email = test_input($_POST["email"]);
    }

    $sql = "UPDATE Utilizadores SET nome = ?, email = ?, caminhoFoto = ?, cargo = ?, status = ?  WHERE ID = ?";
    $stmt = $PDO->prepare($sql);

    //houve upload de uma nova foto?
    if (!($_FILES['foto']['size'] == 0)) {  //se não estiver vazia
        $path = "./uploads/";
        $path = $path . basename($_FILES['foto']['name']);
        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $path)) {
            array_push($error, "A foto é um campo obrigatório");
        }
        $stmt->bindParam(3, basename($_FILES['foto']['name']));

    } else { //não houve upload duma nova foto.
        $stmt->bindParam(3, $_POST['fotoOriginal']);

    }

    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(4, $_POST['cargo']);
    $stmt->bindParam(5, $_POST['status']);
    $stmt->bindParam(6, $_POST['id']);


    $result = $stmt->execute();


    header("Location: index.php");
}