<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class epiModel extends Model
{
    protected $table = 'epi';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nome',
        'descricao',
        'categoria',
        'data_validade',
        'quantidade',
        'status',
        'data_criacao',
        'hora_criacao'
    ];

    // BUSCAR TODOS OS EPIs
    public function buscarTodosepi()
    {
        $db = Database::connect();

        $sql = "SELECT id, nome, descricao, categoria, data_validade, quantidade, status, data_criacao FROM epi";

        $query = $db->query($sql);

        return $query->getResultArray();
    }

    // CONTAR EPIs DISPONÍVEIS
    public function contarEpisDisponiveis()
    {
        $db = Database::connect();

        $sql = "SELECT COUNT(*) as total FROM epi WHERE status = 'disponivel'";

        $query = $db->query($sql);

        $result = $query->getRow();

        return $result->total ?? 0;
    }

    // CONTAR EPIs VENCIDOS
    public function contarEpisVencidos()
    {
        $db = Database::connect();

        $sql = "SELECT COUNT(*) as total 
                FROM epi 
                WHERE data_validade < NOW() 
                AND status != 'descartado'";

        $query = $db->query($sql);

        $result = $query->getRow();

        return $result->total ?? 0;
    }

    // BUSCAR EPIs VENCIDOS
    public function buscarEpisVencidos()
    {
        $db = Database::connect();

        $sql = "SELECT id, nome, data_validade 
                FROM epi 
                WHERE data_validade < NOW() 
                AND status != 'descartado'
                ORDER BY data_validade ASC 
                LIMIT 5";

        $query = $db->query($sql);

        return $query->getResultArray();
    }

    // INSERIR EPI
    public function inserirEpi($nome, $descricao, $categoria, $data_validade, $quantidade, $status, $data_criacao, $hora_criacao)
    {
        $sql = "INSERT INTO epi 
                (nome, descricao, categoria, data_validade, quantidade, status, data_criacao, hora_criacao) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        return $this->db->query($sql, [
            $nome,
            $descricao,
            $categoria,
            $data_validade,
            $quantidade,
            $status,
            $data_criacao,
            $hora_criacao
        ]);
    }

    // BUSCAR EPI POR ID
    public function buscarEpiPorId($id)
    {
        $sql = "SELECT * FROM epi WHERE id = ? LIMIT 1";

        $query = $this->db->query($sql, [$id]);

        return $query->getRowArray();
    }

    // ATUALIZAR EPI
    public function atualizarEpi($id, $nome, $descricao, $categoria, $data_validade, $quantidade, $status)
    {
        $sql = "UPDATE epi 
                SET nome = ?, descricao = ?, categoria = ?, data_validade = ?, quantidade = ?, status = ?
                WHERE id = ?";

        return $this->db->query($sql, [
            $nome,
            $descricao,
            $categoria,
            $data_validade,
            $quantidade,
            $status,
            $id
        ]);
    }

    // DELETAR EPI
    public function deletarEpi($id)
    {
        $sql = "DELETE FROM epi WHERE id = ?";

        return $this->db->query($sql, [$id]);
    }

    // BUSCAR ÚLTIMAS ENTREGAS
    public function buscarUltimasEntregas($limite = 5)
    {
        $db = Database::connect();

        $sql = "SELECT id, nome, DATE_FORMAT(data_criacao, '%d/%m/%Y') as data 
                FROM usuario 
                ORDER BY data_criacao DESC 
                LIMIT ?";

        $query = $db->query($sql, [$limite]);

        return $query->getResultArray();
    }
}