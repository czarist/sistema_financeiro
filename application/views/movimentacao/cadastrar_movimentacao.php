<?php

$page_name = 'Cadastrar';

$this->load->view('layout/header');
?>

<script type="text/javascript">
	window.addEventListener("load", function() {
		document.getElementById("title").innerHTML = '<?= $page_name ?>';
	});
</script>

<div class="container mt-5">
	<div class="row">
		<div class="col-6 offset-3">
			<h1 class='mt-5'>Cadastrar Movimentação</h1>
			<?php
			if (validation_errors()) {
				echo
				'<div class="alert alert-danger mt-1" role="alert">
									' . validation_errors() . '
								</div>';

				echo $this->session->flashdata('cadastro-movimentacao');
			}
			echo $this->session->flashdata('cadastro-movimentacao'); ?>
			<form enctype="multipart/form-data" action="cadastrar" method="POST">
				<div class="form-group mt-5">
					<label for="descricao">Descrição</label>
					<input type="text" id="descricao" class="form-control" placeholder="Descrição" name="descricao" required />
				</div>
				<div class="form-group">
					<label for="valor">Valor</label>
					<input type="text" id="valor" class="form-control" placeholder="Valor" name="valor" required />
				</div>
				<div class="form-group">
					<label for="tipo">Tipo</label>
					<input type="text" id="tipo" class="form-control" placeholder="Tipo" name="tipo" required />
				</div>
				<div class="form-group">
					<label for="data">Data</label>
					<input type="date" id="data" class="form-control" placeholder="Data" name="data" required />
				</div>
				<div class="form-group">
					<input type="file" class="ut" id="comprovante" name="comprovante" lang="pt">
				</div>
				<div class="form-group">
					<input type="submit" id="enviar" class="btn btn-default w-100" name="enviar" />
				</div>
			</form>
		</div>
	</div>
</div>
</body>

</html>