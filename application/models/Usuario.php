<?php

class Usuario extends CI_Model
{
    public function insert($usuario)
    {
        $this->db->insert('t_usuario', $usuario);
        return $this->db->insert_id();
    }

    public function autenticar($email, $senha)
    {
        return $this->db->get_where('t_usuario', array('email' => $email, 'senha' => $senha))->row();
    }

    public function definirTokenRecuperarSenha($email, $token)
    {
        $this->db->where('email', $email);
        $this->db->update('t_usuario', array('token_recuperacao' => $token));

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function validarToken($token)
    {
        $usuario = $this->db->get_where('t_usuario', array('token_recuperacao' => $token))->row();
        return !is_null($usuario);
    }

    public function salvarNovaSenha($token, $nova_senha)
    {
        $this->db->where('token_recuperacao', $token);
        $this->db->update('t_usuario', array('senha' => $nova_senha, 'token_recuperacao' => NULL));
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }
}
