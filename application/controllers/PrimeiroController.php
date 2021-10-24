<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PrimeiroController extends CI_Controller {
	public function primeiroMetodo() {
		$titulo = 'primeira view!';
		$this->load->view('primeira_view', ['titulo'=>$titulo]);
	}
}
