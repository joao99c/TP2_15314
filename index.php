<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listar Utlizadores</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/myCss.css" rel="stylesheet">
</head>
<body>
<div class=col-md-12>
    <form id="form-list-client">
        <h1>Lista de Utilizadores</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="insert.html" class="btn btn-primary">Criar um novo Utilizador</a>

                    <br/>
                    <br/>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Utilizadores</h3>
                        </div>
                        <table class="table table-hover text-center" id="dev-table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Cargo</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">+</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once('db.php');

                            $sql = "SELECT * FROM Utilizadores";
                            $result = $PDO->query($sql);
                            $rows = $result->fetchAll();

                            foreach ($rows as $row) {

                                ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['nome'] ?></td>
                                    <td class="text-center"><img src="./uploads/<?= $row['caminhoFoto'] ?>"
                                                                 alt="Imagem do Utilizador"
                                                                 style="width: 60px;border-radius: 100px;height: 60px;"></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['cargo'] ?></td>
                                    <td><?= $row['status'] ?></td>
                                    <td class="text-center">
                                        <a href="update.php?edit=<?= $row['id'] ?>"
                                           class="btn btn-success btn-xs">
                                            Editar
                                        </a>
                                        <a href="delete.php?del=<?= $row['id'] ?>"
                                           class="btn btn-danger btn-xs">
                                            Apagar
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>