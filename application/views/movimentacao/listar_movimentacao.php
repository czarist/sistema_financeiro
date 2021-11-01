<?php

$page_name = 'Movimentações';

$this->load->view('layout/header');
?>

<script type="text/javascript">
	window.addEventListener("load", function() {
		document.getElementById("title").innerHTML = '<?= $page_name ?>';
	});
</script>

<main>
	<div class="container mt-5 p-5">
		<h1 class='mt-5'>Movimentações</h1>
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
</main>
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