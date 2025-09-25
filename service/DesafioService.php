<?php
class DesafioService {
    private $dao;
    public function __construct() { $this->dao = new DesafioDAO(); }

    public function listar() { return $this->dao->listar(); }
    public function buscarPorId($id) { return $this->dao->buscarPorId($id); }
    public function criar($nome, $descricao) { return $this->dao->criar($nome, $descricao); }
    public function editar($id, $nome, $descricao) { return $this->dao->editar($id, $nome, $descricao); }
    public function excluir($id) { return $this->dao->excluir($id); }
}
