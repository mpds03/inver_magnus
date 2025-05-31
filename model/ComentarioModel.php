<?php
class ComentarioModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerComentariosPorProducto($codigo) {
        $stmt = $this->conn->prepare("SELECT c.comentario, c.fecha, cl.nombres FROM comentarios c JOIN cliente cl ON c.numero_documento = cl.numero_documento WHERE c.codigo = ? ORDER BY c.fecha DESC");
        $stmt->execute([$codigo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarComentario($codigo, $numero_documento, $comentario) {
        $stmt = $this->conn->prepare("INSERT INTO comentarios (codigo, numero_documento, comentario, fecha) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$codigo, $numero_documento, $comentario]);
    }
}