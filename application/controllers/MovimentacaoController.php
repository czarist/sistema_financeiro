<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MovimentacaoController extends CI_Controller
{
	public function formCadastroMovimentacao()
	{
		$this->load->helper('form');
		return $this->load->view('movimentacao/cadastrar_movimentacao');
	}

	public function inserirMovimentacao()
	{

		$this->form_validation->set_rules('descricao', 'Descrição', 'required');
		$this->form_validation->set_rules('tipo', 'Tipo', 'required');
		$this->form_validation->set_rules('data', 'Data', 'required');
		$this->form_validation->set_rules('valor', 'Valor', 'required|numeric');

		if ($this->form_validation->run() == false) {
			return $this->load->view('movimentacao/cadastrar_movimentacao');
		} else {
			$this->load->model('Movimentacao', "movimentacao", true);

			date_default_timezone_set('America/Sao_Paulo');

			$data = [
				'descricao' => $this->input->post('descricao'),
				'tipo' => $this->input->post('tipo'),
				'data' => $this->input->post('data'),
				'valor' => $this->input->post('valor'),
				'datahora_cadastro' => date('Y-m-d H:i:s'),
				'datahora_ultimaalteracao' => date('Y-m-d H:i:s'),
			];

			$this->movimentacao->insert($data);
		}
	}

	public function listarMovimentacao()
	{
		$this->load->model('Movimentacao', "movimentacao", true);

		// echo '<pre>';
		// var_dump($this->movimentacao->getMovimentacoes());
		// echo '</pre>';

		$list_movimentacoes = $this->movimentacao->getMovimentacoes();
		$dados = array(
			'lista_movimentacoes' => $list_movimentacoes
		);
		$this->load->view('movimentacao/listar_movimentacao', $dados);
	}

	public function excluirMovimentacao($movimentacao_id)
	{
		$this->load->model('Movimentacao', "movimentacao", true);
		$this->movimentacao->excluir($movimentacao_id);
		redirect(base_url('movimentacoes'));
	}

	public function editarMovimentacao($movimentacao_id)
	{
		$this->load->model('Movimentacao', "movimentacao", true);
		$movimentacao = $this->movimentacao->buscarPorCodigo($movimentacao_id);
		$dados = array(
			'movimentacao' => $movimentacao
		);
		$this->load->view('movimentacao/editar_movimentacao', $dados);
	}

	public function salvarMovimentacao($movimentacao_id)
	{
		$this->form_validation->set_rules('descricao', 'Descrição', 'required');
		$this->form_validation->set_rules('tipo', 'Tipo', 'required');
		$this->form_validation->set_rules('data', 'Data', 'required');
		$this->form_validation->set_rules('valor', 'Valor', 'required|numeric');

		if ($this->form_validation->run() === FALSE) {
			$this->editarMovimentacao($movimentacao_id);
		} else {
			$movimentacao = array(
				'descricao' => $this->input->post('descricao'),
				'tipo' => $this->input->post('tipo'),
				'data' => $this->input->post('data'),
				'valor' => $this->input->post('valor'),
				'datahora_ultimaalteracao' => date('Y-m-d H:i:s')
			);

			$this->load->model('Movimentacao', "movimentacao", true);
			$id = $this->movimentacao->atualizar($movimentacao_id, $movimentacao);

			if ($id === null) {
				$this->session->set_flashdata('edicao-movimentacao', 'Erro ao salvar as alterações da movimentação.');
			} else {
				$this->session->set_flashdata('edicao-movimentacao', 'Alterações salvas com sucesso.');
			}

			redirect(base_url("movimentacao/editar/{$movimentacao_id}"));
		}
	}
}
