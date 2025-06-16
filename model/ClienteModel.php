<?php

class ClienteModel{
        private $conn;
        private $table = "cliente";

        public function __construct($db){
            $this->conn =$db;
        }

        public function insertUser($numero_documento, $IdDocum, $nombres, $apellidos, $direccion, $contraseña, $email){
            $query = "INSERT INTO " . $this->table . "(numero_documento, IdDocum, nombres, apellidos, direccion, contraseña, email ) VALUES (?,?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$numero_documento, $IdDocum, $nombres, $apellidos, $direccion, $contraseña, $email]);
        }

        public function getUsers()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUserByNumDocum($numero_documento) {
        $query = "SELECT * FROM " . $this->table . " WHERE numero_documento LIKE ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['%' .$numero_documento . '%']);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC); // Asegura array asociativo
        return $cliente ? $cliente : [];
    }
    
    public function actualizarSinContraseña($IdDocum, $nombres, $apellidos, $direccion, $email, $numero_documento )
    {
        $query = "UPDATE " . $this->table . " SET IdDocum=?, nombres=?, apellidos=?, 
        direccion=?, email=? WHERE numero_documento=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$IdDocum, $nombres, $apellidos, $direccion, $email, $numero_documento ]);
    }

    public function eliminar($numero_documento){
        $query= "DELETE FROM ". $this->table. " WHERE numero_documento=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$numero_documento]);
    }

    public function getUserByDocumento($numero_documento) {
       $query = "SELECT * FROM " . $this->table ." WHERE numero_documento = :numero_documento";
        $stmt = $this->conn->prepare($query);
         $stmt->bindParam(':numero_documento', $numero_documento);
         $stmt->execute();
         return $stmt->fetch(PDO::FETCH_ASSOC);
     }
     public function getTipoDocNombre($id) {
        $tiposDoc = [
            1 => 'Cédula de Ciudadanía',
            2 => 'Registro Civil',
            3 => 'Cédula de Extranjería'
        ];
        return isset($tiposDoc[$id]) ? $tiposDoc[$id] : $id;
    }
    public function getUserByEmail($email) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarContraseñaPorEmail($email, $hash) {
        $query = "UPDATE " . $this->table . " SET contraseña=? WHERE email=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$hash, $email]);
    }




    // no se si sirve    
    public function actualizarRol($numero_documento, $rol) {
    $query = "UPDATE " . $this->table . " SET rol=? WHERE numero_documento=?";
    $stmt = $this->conn->prepare($query);
    return $stmt->execute([$rol, $numero_documento]);
}
}
// parte hecha del video 
?>
