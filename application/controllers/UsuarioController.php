<?php

class UsuarioController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario', 'usuario');
    }

    public function formCadastroUsuario()
    {
        $this->load->view('usuario/registrar_usuario');
    }

    public function inserirUsuario()
    {

        $this->form_validation->set_rules('nome', 'Nome', "required|trim|max_length[100]");
        $this->form_validation->set_rules('email', 'E-mail', "required|trim|is_unique[t_usuario.email]");
        $this->form_validation->set_rules('senha', 'Senha', "required|trim|min_length[6]");

        if ($this->form_validation->run() === FALSE) {
            $this->formCadastroUsuario();
        } else {
            $data = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'senha' => sha1($this->input->post('senha'))
            );

            $usuario_id = $this->usuario->insert($data);
            if (!is_null($usuario_id)) {
                $this->session->set_flashdata('usuario', "<p class='alert alert-succes'> Usuário cadastrado com sucesso.</p>");
            } else {
                $this->session->set_flashdata('usuario', "<p class='alert alert-danger'> Ocorreu um erro ao cadastrar o usuário.</p>");
            }
            redirect(base_url('usuarios/cadastrar'));
        }
    }
}
