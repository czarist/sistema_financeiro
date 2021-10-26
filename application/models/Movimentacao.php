<?php 

class Movimentacao extends CI_Model {
	
	public function Insert($movimentacao)
	{
		$this->db->insert('t_transacao', $movimentacao);
	}
	public function getMovimentacoes()
	{
	 return	$this->db->get('t_transacao')->result();
	}
	public function excluir($movimentacao_id)
	{
		$this->db->where('id', $movimentacao_id);
		$this->db->delete('t_transacao');
	}
}
