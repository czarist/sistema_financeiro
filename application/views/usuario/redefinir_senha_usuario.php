<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Redefinir Senha</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 offset-3">
                <h1>Redefinir Senha</h1>
                <?php if ($tokenValido) { ?>

                    <?= validation_errors() ?>
                    <?= form_open(base_url("usuarios/redefinir-senha/{$token}")) ?>
                    <?= $this->session->flashdata('redefinir-senha') ?>

                    <div class="form-group">
                        <label class="mb-2" for="email">Digite sua nova senha</label>
                        <input class="form-control" type="password" name="senha" id="senha" maxlength="100" placeholder="senha" required>
                    </div>
                    <button class="btn btn-success btn-block">Enviar</button>
                <?php
                    echo form_close();
                } else {
                ?>
                    <p class="alert alert-danger">Token de redefinição invalido</p>
                <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>