<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class usuarioModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nome',
        'email',
        'senha',
        'data_criacao',
        'hora_criacao'
    ];

    public function buscarTodosusuario()
    {
        $db = Database::connect();

        $sql = "SELECT id, nome, email, senha, data_criacao, hora_criacao FROM epi";

        $query = $db->query($sql);

        return $query->getResultArray();
    }

    // AUTENTICAR USUÁRIO
    public function autenticar($usuario, $senha)
    {
        $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ? 
                LIMIT 1";

        $query = $this->db->query($sql, [$usuario, $senha]);

        return $query->getRowArray();
    }

    // INSERIR USUÁRIO
    public function inserirUsuario($nome, $email, $senha, $data_criacao, $hora_criacao)
    {
        $sql = "INSERT INTO usuario 
                (nome, email, senha, data_criacao, hora_criacao) 
                VALUES (?, ?, ?, ?, ?)";

        return $this->db->query($sql, [
            $nome,
            $email,
            $senha,
            $data_criacao,
            $hora_criacao
        ]);
    }

    // BUSCAR USUÁRIO POR ID
    public function buscarusuarioPorId($id)
    {
        $sql = "SELECT * FROM usuario WHERE id = ?";

        return $this->db->query($sql, [$id])->getRowArray();
    }

    // ATUALIZAR USUÁRIO
    public function atualizarUsuario($id, $nome, $email, $senha, $data_criacao, $hora_criacao)
    {
        $sql = "UPDATE usuario 
                SET nome = ?, 
                    email = ?, 
                    senha = ?, 
                    data_criacao = ?, 
                    hora_criacao = ?
                WHERE id = ?";

        return $this->db->query($sql, [
            $nome,
            $email,
            $senha,
            $data_criacao,
            $hora_criacao,
            $id
        ]);
    }
}

