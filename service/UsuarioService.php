<?php
class UsuarioService {
    private $dao;
    public function __construct() { $this->dao = new UsuarioDAO(); }

    public function listar() { return $this->dao->listar(); }
    public function buscarPorId($id) { return $this->dao->buscarPorId($id); }
    public function criar($nome, $email) { return $this->dao->criar($nome, $email); }
    public function editar($id, $nome, $email) { return $this->dao->editar($id, $nome, $email); }
    public function excluir($id) { return $this->dao->excluir($id); }
}
