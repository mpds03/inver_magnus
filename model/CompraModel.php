<?php
class CompraModel{
    private $conn;
    private $table= 'compra';

    public function __construct($db){
        $this->conn= $db;
    }

    public function HacerCompra($numero_documento, $dirección){
        $query = "INSERT INTO ". $this->table . "(numero_documento, dirección) VALUES (?,?)";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$numero_documento, $dirección]);
    }

    public function agregarDetalleCompra($idcompra, $codigo, $cantidad, $precioUnitario){
        $query= "INSERT INTO detalle_compra(idcompra, codigo, cantidad, precioUnitario) VALUES (?,?,?,?)";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idcompra, $codigo, $cantidad, $precioUnitario]);
    }

    

}