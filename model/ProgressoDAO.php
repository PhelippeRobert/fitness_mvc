<?php
class ProgressoDAO {
    public function listar() {
        $conn = Database::getConnection();
        $sql = "SELECT p.id, u.nome as usuario, d.nome as desafio, p.progresso 
                FROM progresso p
                JOIN usuarios u ON u.id = p.usuario_id
                JOIN desafios d ON d.id = p.desafio_id";
        return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $progresso) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE progresso SET progresso = :progresso WHERE id = :id");
        return $stmt->execute([":id" => $id, ":progresso" => $progresso]);
    }

    public function criar($usuario_id, $desafio_id, $progresso) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO progresso (usuario_id, desafio_id, progresso) VALUES (:u, :d, :p)");
        return $stmt->execute([":u" => $usuario_id, ":d" => $desafio_id, ":p" => $progresso]);
    }
}
