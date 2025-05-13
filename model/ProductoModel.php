<?php
class ProductoModel{
    private $conn;
    private $table = 'producto';

    public function __construct($db){
        $this->conn= $db;

    }
    public function InsertProducto($IdCategoria,$descripcion, $precio, $foto, $nombre){
        $query = "INSERT INTO ". $this->table . "(IdCategoria,descripcion, precio, foto, nombre) VALUES (?,?,?,?,?)";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$IdCategoria, $descripcion, $precio, $foto, $nombre]);
    }
    public function getNextCodigo() {
        $query = "SELECT MAX(codigo) AS ultimo_codigo FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return ($row['ultimo_codigo'] ?? 0) + 1;
    }
    public function getProducto(){
        $query= "SELECT * FROM " .$this->table;
        $stmt= $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function ProductoByCodigo($codigo)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE codigo LIKE ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['%' . $codigo . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Actualizar($IdCategoria, $descripcion,$precio,$foto,$nombre,$codigo){
        $query = "UPDATE " . $this->table . " SET IdCategoria=?, descripcion=?, precio=?, foto=?, nombre=? 
         WHERE codigo=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$IdCategoria,$descripcion,$precio,$foto,$nombre,$codigo]);
    }

    public function Eliminar($codigo){
        $query= "DELETE FROM ". $this->table. " Where codigo=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$codigo]);
    }
    
    }
 