<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Utlizadore</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/myCss.css" rel="stylesheet">
</head>
<body>
<?php

require_once('db.php');

$id = $_REQUEST["edit"];

$sql = "SELECT * FROM Utilizadores WHERE id = " . $id . ";";
$result = $PDO->query($sql);
$rows = $result->fetch();


?>


<div class=col-md-12>
    <h1>Editar um Utilizador</h1>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <form class="form-horizontal" action="updateDB.php" enctype="multipart/form-data" method="post">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Formulário</legend>


                        <input type="hidden" name="id" id="id" value="<?= $rows['id'];?>">

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nome">Nome</label>
                            <div class="col-md-4">
                                <input id="nome" name="nome" type="text" class="form-control input-md" required=""
                                       value="<?= $rows['nome'] ?>">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Email</label>
                            <div class="col-md-4">
                                <input id="email" name="email" type="text" class="form-control input-md" required=""
                                       value="<?= $rows['email'] ?>">

                            </div>
                        </div>

                        <!-- Multiple Radios -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cargo">Cargo</label>
                            <div class="col-md-4">

                                <div class="radio">
                                    <label for="cargo-0">
                                        <input type="radio" name="cargo" id="cargo-0"
                                               value="Admin" <?php echo ($rows['cargo'] == 'Admin') ? 'checked' : '' ?>>
                                        Admin
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="cargo-1">
                                        <input type="radio" name="cargo" id="cargo-1"
                                               value="Publisher" <?php echo ($rows['cargo'] == 'Publisher') ? 'checked' : '' ?>>
                                        Publisher
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="cargo-2">
                                        <input type="radio" name="cargo" id="cargo-2"
                                               value="Reviewer" <?php echo ($rows['cargo'] == 'Reviewer') ? 'checked' : '' ?>>
                                        Reviewer
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="cargo-3">
                                        <input type="radio" name="cargo" id="cargo-3"
                                               value="Moderator" <?php echo ($rows['cargo'] == 'Moderator') ? 'checked' : '' ?>>
                                        Moderator
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Multiple Radios (inline) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="status">Status</label>
                            <div class="col-md-4">
                                <label class="radio-inline" for="status-0">
                                    <input type="radio" name="status" id="status-0"
                                           value="Active" <?php echo ($rows['status'] == 'Active') ? 'checked' : '' ?>>
                                    Active
                                </label>
                                <label class="radio-inline" for="status-1">
                                    <input type="radio" name="status" id="status-1"
                                           value="Suspended" <?php echo ($rows['status'] == 'Suspended') ? 'checked' : '' ?>>
                                    Suspended
                                </label>
                                <label class="radio-inline" for="status-2">
                                    <input type="radio" name="status" id="status-2"
                                           value="Inactive" <?php echo ($rows['status'] == 'Inactive') ? 'checked' : '' ?>>
                                    Inactive
                                </label>
                            </div>
                        </div>

                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="foto">Foto</label>
                            <div class="col-md-4"><img src="./uploads/<?= $rows['caminhoFoto'] ?>"
                                                       alt="Imagem do Utilizador"
                                                       style="width: 180px; border-radius: 100px"></td>
                                <br>
                                <br>
                                <br>
                                <input id="foto" name="foto" class="input-file" type="file">
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="submit"></label>
                            <div class="col-md-4">
                                <button id="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>


    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
