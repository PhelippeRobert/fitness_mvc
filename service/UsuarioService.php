<?php

class UsuarioService {
    private $dao;

    public function __construct() {
        $this->dao = new UsuarioDAO();
    }

    public function listarTodos() {
        return $this->dao->findAll();
    }

    public function buscarPorId($id) {
        return $this->dao->findById($id);
    }

    public function criar($data) {
        if (!isset($data["nome"]) || !isset($data["email"])) {
            throw new Exception("Nome e email são obrigatórios.");
        }

        return $this->dao->create($data);
    }

    public function atualizar($id, $data) {
        return $this->dao->update($id, $data);
    }

    public function excluir($id) {
        return $this->dao->delete($id);
    }

public function buscarPorEmailSenha($email, $senha) {
    try {
        return $this->dao->buscarPorEmailSenha($email, $senha);
    } catch (Exception $e) {
        return null;
    }
}

}