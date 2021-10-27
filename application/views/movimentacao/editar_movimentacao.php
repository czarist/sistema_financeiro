<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Editar</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-6 offset-3 mt-5">
				<h1>
					Editar Movimentação
				</h1>
				<?php
				if (validation_errors()) {
					echo
					'<div class="alert alert-danger mt-1" role="alert">
						' . validation_errors() . '
					</div>';
				}

				if ($this->session->flashdata('edicao-movimentacao')) {
					echo
					'<div class="alert alert-success mt-1" role="alert">
						' . $this->session->flashdata('edicao-movimentacao') . '
					</div>';
				}
				?>

				<form enctype="multipart/form-data" action="<?= base_url("movimentacao/editar/{$movimentacao->id}") ?>" method="POST">
					<div class="form-group ">
						<label for="descricao">Descrição</label>
						<input type="text" id="descricao" class="form-control" placeholder="Descrição" name="descricao" value="<?= $movimentacao->descricao ?>" />
					</div>
					<div class="form-group">
						<label for="valor">Valor</label>
						<input type="text" id="valor" class="form-control" placeholder="Valor" name="valor" value="<?= $movimentacao->valor ?>" />
					</div>
					<div class="form-group">
						<label for="tipo">Tipo</label>
						<input type="text" id="tipo" class="form-control" placeholder="Tipo" name="tipo" value="<?= $movimentacao->tipo ?>" />
					</div>
					<div class="form-group">
						<label for="data">Data</label>
						<input type="text" id="data" class="form-control" placeholder="Data" name="data" value="<?= $movimentacao->data ?>" />
					</div>
					<div class="form-group">
						<input type="file" class="ut" id="comprovante" name="comprovante" lang="pt" required>
					</div>
					<div class="form-group">
						<input type="submit" id="salvar" class="btn btn-default w-100" value="Salvar" name="salvar" />
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>