<?php

class ClienteModel{
        private $conn;
        private $table = "cliente";

        public function __construct($db){
            $this->conn =$db;
        }

        public function insertUser($numero_documento, $IdDocum	, $nombres, $apellidos, $telefono, $contraseña, $email){
            $query = "INSERT INTO " . $this->table . "(numero_documento, IdDocum, nombres, apellidos, telefono, contraseña, email ) VALUES (?,?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$numero_documento, $IdDocum, $nombres, $apellidos, $telefono, $contraseña, $email]);
        }

        public function Login($IdDocum, $numero_documento, $contraseña)
    {
        $query = "SELECT * FROM cliente WHERE numero_documento = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$numero_documento]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($cliente && $contraseña === $cliente['contraseña']) {
            return $cliente;
            
        }
        return false;
    }
}
// parte hecha del video
?>
