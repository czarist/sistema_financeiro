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
}
