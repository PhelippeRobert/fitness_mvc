<?php
class UsuarioDAO {
    public function listar() {
        $conn = Database::getConnection();
        return $conn->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->execute([":id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $email) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        return $stmt->execute([":nome" => $nome, ":email" => $email]);
    }

    public function editar($id, $nome, $email) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
        return $stmt->execute([":id" => $id, ":nome" => $nome, ":email" => $email]);
    }

    public function excluir($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
        return $stmt->execute([":id" => $id]);
    }
}
