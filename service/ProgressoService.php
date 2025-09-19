<?php
class ProgressoService {
    private $dao;
    public function __construct() { $this->dao = new ProgressoDAO(); }

    public function listar() { return $this->dao->listar(); }
    public function atualizar($id, $progresso) { return $this->dao->atualizar($id, $progresso); }
    public function criar($usuario_id, $desafio_id, $progresso) { return $this->dao->criar($usuario_id, $desafio_id, $progresso); }
}
