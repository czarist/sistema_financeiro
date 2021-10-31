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
	<title>Movimentações</title>
</head>

<body>
	<div class="container mt-5">
		<h1>Movimentações</h1>
		<?= $this->session->flashdata('listar-movimentacao'); ?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Ação</th>
					<th>
						Código
					</th>
					<th>
						Descrição
					</th>
					<th>
						Tipo
					</th>
					<th>
						Valor
					</th>
					<th>
						Data
					</th>
					<th>
						Comprovante
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($lista_movimentacoes as $key_movimentacao) { ?>
					<tr>
						<td>
							<a href="<?php echo base_url("movimentacao/excluir/{$key_movimentacao->id}"); ?>" class="btn btn-danger btn-excluir" type="button">Exluir</a>
							<a href="<?php echo base_url("movimentacao/editar/{$key_movimentacao->id}"); ?>" class="btn btn-primary" type="button">Editar</a>
						</td>
						<td><?php echo $key_movimentacao->id; ?></td>
						<td><?php echo $key_movimentacao->descricao; ?></td>
						<td><?php echo $key_movimentacao->tipo; ?></td>
						<td><?php echo $key_movimentacao->valor; ?></td>
						<td><?php echo $key_movimentacao->data; ?></td>
						<td><?php
							if (($key_movimentacao->arquivo_comprovante)) { ?>
								<a href="<?php echo base_url($key_movimentacao->arquivo_comprovante); ?>" download class="btn btn-success">Ver</a>
							<?php
							} else echo 'comprovante indisponível';
							?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
<script>
	$(function() {
		$('.btn-excluir').click(function(e) {
			e.preventDefault();
			if (confirm("Tem certeza que deseja excluir este registro?")) {
				const href = $(this).attr('href');
				window.location.href = href;
			}
		})
	});
</script>

</html>