<?php
session_start();
require_once './model/ClienteModel.php';
require_once './config/database.php';

class clientecontroller{
    private $db;
    private $ClienteModel;
    
    public function __construct(){
        $database = new Database();
        $this->db = $database->getConnection();
        $this->ClienteModel = new ClienteModel($this->db);
    }

    public function insertUser(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $numero_documento = $_POST['numero_documento'];
            $IdDocum = $_POST['IdDocum'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $contraseña = $_POST['contraseña'];
            $email= $_POST['email'];

            $this->ClienteModel->insertUser($numero_documento, $IdDocum, $nombres, $apellidos, 
            $telefono, $contraseña, $email);
            header("Location: index.php?action=dashboard");
            
        }
    }

    public function Login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $IdDocum= $_POST['IdDocum'];
            $numero_documento = $_POST['numero_documento'];
            $contraseña = $_POST['contraseña'];
            $cliente = $this->ClienteModel->Login($IdDocum,$numero_documento, $contraseña);

            if ($cliente) {
                $_SESSION['rol'] = $cliente['rol'];
                $_SESSION['nombre'] = $cliente['nombres'];
                if ($cliente['rol'] == "admin" || $cliente['rol'] == "empleado") {
                    header("Location: index.php?action=InverBoard");
                }
                exit();
            } else {
                header("Location: index.php?action=login");
            }
        }
}
}

?>

