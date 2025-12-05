<?php

class UsuarioDAO {
    private $conn;
    private $table = "usuarios";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function findAll() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO {$this->table} (nome, email) VALUES (:nome, :email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":nome", $data["nome"]);
        $stmt->bindValue(":email", $data["email"]);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function update($id, $data) {
        $sql = "UPDATE {$this->table} SET nome = :nome, email = :email WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":nome", $data["nome"]);
        $stmt->bindValue(":email", $data["email"]);
        $stmt->bindValue(":id", $id);

        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }

public function buscarPorEmailSenha($email, $senha) {


    
    try {
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        return null;
    }
}
}

