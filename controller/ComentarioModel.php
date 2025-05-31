<?php
public function obtenerComentariosPorProducto($codigo) {
    $stmt = $this->conn->prepare("SELECT c.comentario, c.fecha, cl.nombres FROM comentarios c JOIN cliente cl ON c.numero_documento = cl.numero_documento WHERE c.codigo = ? ORDER BY c.fecha DESC");
    $stmt->execute([$codigo]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}