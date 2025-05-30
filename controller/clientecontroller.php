<?php

require_once './model/ClienteModel.php';
require_once './config/database.php';

class clientecontroller {
    private $db;
    private $ClienteModel;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->ClienteModel = new ClienteModel($this->db);
    }

    public function insertUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero_documento = $_POST['numero_documento'];
            $IdDocum = $_POST['IdDocum'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $contraseña = $_POST['contraseña'];
            $email = $_POST['email'];


            //validacion con numero_documento

            switch ($IdDocum) {
            case '1': // CC
            if (!preg_match('/^\d{7,10}$/', $numero_documento)) {
            echo "<script>alert('La cédula de ciudadanía debe tener entre 7 y 10 dígitos.'); window.history.back();</script>";
            exit;
            }
        break;
            case '2': // RC
            if (!preg_match('/^\d{10}$/', $numero_documento)) {
            echo "<script>alert('El registro civil debe tener exactamente 10 dígitos.'); window.history.back();</script>";
            exit;
        }
        break;
            case '3': // CE
            if (!preg_match('/^[A-Za-z0-9]{6,12}$/', $numero_documento)) {
            echo "<script>alert('La cédula de extranjería debe tener entre 6 y 12 caracteres alfanuméricos.'); window.history.back();</script>";
            exit;
        }
        break;
        default:
            echo "<script>alert('Tipo de documento no reconocido.'); window.history.back();</script>";
        exit;
}

        //validacion de 10 numeros en telefono
        if (!preg_match('/^\d{10}$/', $telefono)) {
            echo "<script>alert('El número de teléfono debe tener exactamente 10 dígitos.'); window.history.back();</script>";
        exit;
        }

         // Validación de contraseña segura
        if (!$this->validarContraseña($contraseña)) {
            echo "<script>alert('La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un símbolo especial.'); window.history.back();</script>";
                exit;
        }

        // Encriptar la contraseña
            $contraseñaHash = password_hash($contraseña, PASSWORD_BCRYPT);

            // Insertar usuario en la base de datos
            $this->ClienteModel->insertUser(
                $numero_documento, 
                $IdDocum, 
                $nombres, 
                $apellidos, 
                $telefono, 
                $contraseñaHash, 
                $email
            );
        session_start();
        $_SESSION['correo_usuario'] = $email;
        header("Location: index.php?action=dashboard");
        }
    }

    // Función para validar seguridad de contraseña
    private function validarContraseña($contraseña) {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.,])[A-Za-z\d@$!%*?&.,]{8,}$/', $contraseña);
    }
    public function listUsers()
    {
        $clientes = $this->ClienteModel->getUsers();
        // Mapear el nombre del tipo de documento aquí
        foreach ($clientes as &$cliente) {
            $cliente['tipo_doc_nombre'] = $this->ClienteModel->getTipoDocNombre($cliente['IdDocum']);
        }
        return $clientes;
    }
    public function UserByNumDocum()
    {
        $numero_documento = $_GET['numero_documento'] ?? '';
        return $this->ClienteModel->getUserByNumDocum($numero_documento);
    }

    public function actualizar(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            $IdDocum = $_POST['IdDocum'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $contraseña = $_POST['contraseña'];
            $email= $_POST['email'];
            $numero_documento = $_POST['numero_documento'];

            $this->ClienteModel->actualizar($IdDocum, $nombres, $apellidos, 
            $telefono, $contraseña, $email, $numero_documento);    
        }
    }
   public function eliminar(){
    $numero_documento = $_GET['numero_documento'] ?? '';
    $datosCliente = $this->ClienteModel->eliminar($numero_documento);
    return $this->ClienteModel->eliminar($numero_documento);
   }

    public function login() {
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $numero_documento = $_POST['numero_documento'];
         $contraseña = $_POST['contraseña'];
 
         $cliente = $this->ClienteModel->getUserByDocumento($numero_documento);
 
         if ($cliente && password_verify($contraseña, $cliente['contraseña'])) {
             session_start();
             $_SESSION['cliente'] = $cliente;
             header("Location: index.php?action=InverBoard");
         } else {
             echo "<script>alert('Número de documento o contraseña incorrectos'); window.history.back();</script>";
         }
     }
 }
    public function logout() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    session_unset(); // Limpia todas las variables de sesión
    session_destroy(); // Destruye la sesión

    header("Location: index.php?action=Inverboard");
    exit;
}


}

?>

