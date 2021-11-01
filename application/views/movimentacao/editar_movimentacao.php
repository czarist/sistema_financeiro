<?php

$page_name = 'Editar';

$this->load->view('layout/header');
?>

<script type="text/javascript">
	window.addEventListener("load", function() {
		document.getElementById("title").innerHTML = '<?= $page_name ?>';
	});
</script>

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
					<input type="file" class="ut" id="comprovante" name="comprovante" lang="pt">
				</div>
				<div class="form-group">
					<?php
					if (($movimentacao->arquivo_comprovante)) { ?>
						<a href="<?php echo base_url($movimentacao->arquivo_comprovante); ?>" download class="btn btn-success">Ver</a>
					<?php
					} else echo 'comprovante indisponível';
					?>
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