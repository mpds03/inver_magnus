<?php
class CategoriaModel {
    private $conn;
    private $table = 'categoria';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCategoria() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>