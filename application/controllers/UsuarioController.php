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
        if (usuario_logado() === TRUE) {
            redirect(base_url('movimentacoes'));
        }
        $this->load->view('usuario/registrar_usuario');
    }

    public function inserirUsuario()
    {
        if (usuario_logado() === TRUE) {
            redirect(base_url('movimentacoes'));
        }

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

    public function formLoginUsuario()
    {
        if (usuario_logado() === TRUE) {
            redirect(base_url('movimentacoes'));
        }
        $this->load->view('usuario/login_usuario');
    }

    public function loginUsuario()
    {
        if (usuario_logado() === TRUE) {
            redirect(base_url('movimentacoes'));
        }
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim');
        $this->form_validation->set_rules('senha', 'Senha', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->formLoginUsuario();
        } else {
            $email = $this->input->post('email');
            $senha = sha1($this->input->post('senha'));

            $usuario = $this->usuario->autenticar($email, $senha);

            if (is_null($usuario)) {
                $this->session->set_flashdata('login', "<p class='alert alert-danger'>E-mail ou senha inválidos.</p>");
                redirect(base_url('usuarios/login'));
            } else {
                $sessao = array(
                    'id' => $usuario->id,
                    'nome' => $usuario->nome,
                    'email' => $usuario->email
                );
                $this->session->set_userdata('usuario', $sessao);
                redirect(base_url('movimentacoes'));
            }
        }
    }

    public function logoutUsuario()
    {
        $this->session->unset_userdata('usuario');
        redirect('usuarios/login');
    }

    public function formRecuperarSenha()
    {
        $this->load->view('usuario/recuperar_senha_usuario');
    }

    public function recuperarSenha()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->formRecuperarSenha();
        } else {
            $email = $this->input->post('email');
            $token = md5(date('YmdHis') . $email);

            $tokenDefinido = $this->usuario->definirTokenRecuperarSenha($email, $token);

            if ($tokenDefinido) {

                //mandar email para usuario

                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'ssl://smtp.googlemail.com';
                $config['smtp_port'] = 465;
                $config['smtp_user'] = 'czartrentin@gmail.com';
                $config['smtp_pass'] = '';
                $config['charset'] = 'iso-8859-1';
                $config['mailtype'] = 'html';
                $config['wordwrap'] = TRUE;

                $this->email->initialize($config);

                $this->email->from($config['smtp-user'] . 'Sistema de Controle Financeiro');
                $this->email->to($email);
                $this->email->subject('Recuperação de senha');
                $this->email->message("Olá, <br> Segue abaixo o link de recuperação de senha <br><a href='" . base_url("usuarios/redefinir-senha/{$token}") . "'>" . base_url("usuarios/redefinir-senha/{$token}") . "</a>");
                $this->email->send();

                $this->session->set_flashdata('recuperar-senha', 'enviamos um email para você com instruções para redefinir sua senha');
            } else {
                $this->session->set_flashdata('recuperar-senha', 'Não existe usuário cadastrado com este E-mail');
            }
            redirect(base_url('usuarios/recuperar-senha'));
        }
    }

    public function formRedefinirSenha($token)
    {
        $tokenValido = $this->usuario->validarToken($token);

        $dados = array(
            'token' => $token,
            'tokenValido' => $tokenValido
        );

        $this->load->view('usuario/redefinir_senha_usuario', $dados);
    }

    public function redefinirSenha($token)
    {
        $this->form_validation->set_rules('senha', 'Senha', 'required|trim|min_length[6]');

        if ($this->form_validation->run() === FALSE) {
            $this->formRedefinirSenha($token);
        } else {
            $senha = sha1($this->input->post('senha'));
            $senhaSalva = $this->usuario->salvarNovaSenha($token, $senha);

            if ($senhaSalva) {
                $this->session->set_flashdata('login', 'senha redefinida com sucesso.');
                redirect(base_url('usuarios/login'));
            } else {
                $this->session->set_flashdata('redefinir-senha', 'ocorreu um erro ao salvar nova senha.');
                redirect(base_url("usuarios/redefinir-senha/{$token}"));
            }
        }
    }
}
