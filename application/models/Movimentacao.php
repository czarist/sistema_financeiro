<?php

class Movimentacao extends CI_Model
{

	public function Insert($movimentacao)
	{
		$this->db->insert('t_transacao', $movimentacao);
		return $this->db->insert_id();
	}

	public function getMovimentacoes($usuario_id)
	{
		return	$this->db->get_where('t_transacao', array('id_usuario' => $usuario_id))->result();
	}

	public  function excluir($movimentacao_id)
	{
		$this->db->where('id', $movimentacao_id);
		$this->db->delete('t_transacao');
	}

	public function buscarPorCodigo($movimentacao_id)
	{
		return $this->db->get_where('t_transacao', array('id' => $movimentacao_id))->row();
	}

	public function atualizar($movimentacao_id, $movimentacao)
	{
		$this->db->where('id', $movimentacao_id);
		$this->db->update('t_transacao', $movimentacao);

		if ($this->db->affected_rows() > 0) {
			return $movimentacao_id;
		}
		return null;
	}
}
