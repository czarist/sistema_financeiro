<?php
defined('BASEPATH') or exit('No direct script access allowed');

class indexController extends CI_Controller
{
	public function index()
	{
		redirect(base_url('movimentacoes'));
	}
}
