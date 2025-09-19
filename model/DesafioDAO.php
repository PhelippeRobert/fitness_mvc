<?php
class DesafioDAO {
    public function listar() {
        $conn = Database::getConnection();
        return $conn->query("SELECT * FROM desafios")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM desafios WHERE id = :id");
        $stmt->execute([":id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $descricao) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO desafios (nome, descricao) VALUES (:nome, :descricao)");
        return $stmt->execute([":nome" => $nome, ":descricao" => $descricao]);
    }

    public function editar($id, $nome, $descricao) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE desafios SET nome = :nome, descricao = :descricao WHERE id = :id");
        return $stmt->execute([":id" => $id, ":nome" => $nome, ":descricao" => $descricao]);
    }

    public function excluir($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM desafios WHERE id = :id");
        return $stmt->execute([":id" => $id]);
    }
}
