<?php

function getDadosUsuarioLogado()
{
    $ci = &get_instance();
    $dados_usuario = $ci->session->userdata('usuario');
    return $dados_usuario;
}

function usuario_logado()
{
    $ci = &get_instance();

    return !empty($ci->session->userdata('usuario'));
}
