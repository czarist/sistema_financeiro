<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MovimentacaoController extends CI_Controller {
	public function formCadastroMovimentacao() {
		$this->load->helper('form');
		return $this->load->view('movimentacao/cadastrar_movimentacao');
	}

	public function inserirMovimentacao()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('descricao', 'Descrição', 'required');
		$this->form_validation->set_rules('tipo', 'Tipo', 'required');
		$this->form_validation->set_rules('data', 'Data', 'required');
		$this->form_validation->set_rules('valor', 'Valor', 'required|numeric');

		if($this->form_validation->run() == false) {
			return $this->load->view('movimentacao/cadastrar_movimentacao');
		}else{
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
}
