<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-04-2018
 * Time: 11:37
 */

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

    //Se forem uploaded files, são guardados
    if (!empty($_FILES['foto'])) {
        $path = "./uploads/";
        $path = $path . basename($_FILES['foto']['name']);
        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $path)) {
            array_push($error, "A foto é um campo obrigatório");
        }

        $filename = basename($_FILES['foto']['name']);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

    }
    $caminhoFoto = $filename;
    $cargo = $_POST['cargo'];
    $status = $_POST['status'];

    //Mostar erros
    if (!empty($error)) {

        ?>
        <h2>Errors:</h2>
        <ul>
            <?
            foreach ($error as $erro) {
                ?>
                <li><? echo $erro; ?></li>
                <?
            }
            ?>
        </ul>
        <?
    }
    else {
        $sql = "INSERT INTO Utilizadores(nome, caminhoFoto, email, cargo, status) VALUES (:nome, :caminhoFoto, :email, :cargo, :status)";
        $stmt = $PDO->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':caminhoFoto', $caminhoFoto);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':status', $status);

        $result = $stmt->execute();

        if (!$result) {
            var_dump($stmt->errorInfo());
            exit;
        } else {
            header("Location: index.php");
        }
    }
}





