<?php 

class Movimentacao extends CI_Model {
	
	public function Insert($movimentacao)
	{
		$this->db->insert('t_transacao', $movimentacao);
	}
}
