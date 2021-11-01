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
}
