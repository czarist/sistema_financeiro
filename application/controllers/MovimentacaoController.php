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
		if($this->form_validation->run() == false) {
			return $this->load->view('movimentacao/cadastrar_movimentacao');
		}else{
			echo 'validado';
		}
	}
}
