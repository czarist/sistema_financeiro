<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'indexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// movimentacoes
$route['movimentacao/cadastrar']['GET'] = 'MovimentacaoController/formCadastroMovimentacao';
$route['movimentacao/cadastrar']['POST'] = 'MovimentacaoController/inserirMovimentacao';
$route['movimentacoes']['GET'] = 'MovimentacaoController/listarMovimentacao';
$route['movimentacao/excluir/(:any)']['GET'] = 'MovimentacaoController/excluirMovimentacao/$1';
$route['movimentacao/editar/(:any)']['GET'] = 'MovimentacaoController/editarMovimentacao/$1';
$route['movimentacao/editar/(:any)']['POST'] = 'MovimentacaoController/salvarMovimentacao/$1';

// usuarios

$route['usuarios/cadastrar']['GET'] = 'UsuarioController/formCadastroUsuario';
$route['usuarios/cadastrar']['POST'] = 'UsuarioController/inserirUsuario';
$route['usuarios/login']['GET'] = 'UsuarioController/formLoginUsuario';
$route['usuarios/login']['POST'] = 'UsuarioController/loginUsuario';
$route['usuarios/logout']['GET'] = 'UsuarioController/logoutUsuario';
$route['usuarios/recuperar-senha']['GET'] = 'UsuarioController/formRecuperarSenha';
$route['usuarios/recuperar-senha']['POST'] = 'UsuarioController/recuperarSenha';
$route['usuarios/redefinir-senha/(:any)']['GET'] = 'UsuarioController/formRedefinirSenha/$1';
$route['usuarios/redefinir-senha/(:any)']['POST'] = 'UsuarioController/redefinirSenha/$1';





