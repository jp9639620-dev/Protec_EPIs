<?php

namespace App\Controllers;

use App\Models\usuarioModel;
use App\Models\epiModel;


class Home extends BaseController
{
    // Redireciona direto para o dashboard (sem tela de login)
    public function index()
    {
        return redirect()->to(base_url('home/principal'));
    }

    // Abre a página de autenticação
    public function autenticar() 
    {
        $model = new usuarioModel();

        // recupera os dados do formulário
        $usuario = $this->request->getPost('usuario');
        $senha = $this->request->getPost('senha');

        // chama o método simplificado que criamos no Model
        $usuario = $model->autenticar($usuario, $senha);

        if ($usuario) {
            // redirecionar para a tela principal (CRUD de Equipamentos)
            return redirect()->to(base_url('home/principal'));
        } else {
            // se falhar, volta para o login com uma mensagem de erro
            return redirect()->to(base_url('home/erro'));
        }
    }

    public function principal()
    {
        return view('principal');
    }

    public function erro_auth()
    {
        return view('auto_auth');
    }

    public function listarepi()
    {
        $model = new epiModel();
        $dados['epi'] = $model->buscarTodosepi();

        return view('lista_epi', $dados);
    }

    public function editar($id)
    {
        $model = new usuariosModel();
        $dados['usuario'] = $model->buscarusuarioPorId($id);

        return view('form_editar_usuario', $dados);
    }

    public function atualizar()
    {
        $model = new usuarioModel();

        $id = $this->request->getPost('id'); // ID escondido no formulário
        $nome = $this->request->getPost('nome');
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
        $data_criacao = $this->request->getPost('data_criacao');
        $hora_criacao = $this->request->getPost('hora_criacao');

        if ($model->atualizarUsuario($id, $nome, $email, $senha, $data_criacao, $hora_criacao)) {
            return redirect()->to(base_url('usuario'));
        }
    }

    public function equipamentopis()
    {
        return view('equipamentopis');
    }

   
    public function colaboradores()
    {
        return view('colaboradores');
    }

    public function epis()
    {
        return view('EPIs');
    }

    public function entregas()
    {
        return view('entregas');
    }
}   