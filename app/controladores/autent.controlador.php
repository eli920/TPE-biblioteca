<?php
require_once './app/modelos/usuario.modelo.php';
require_once './app/vistas/autent.vista.php';

class AutentControlador {
    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new UsuarioModelo();
        $this->vista = new AutentVista();
    }

    public function mostrarAcceso() {
        // Muestro el formulario de login
        return $this->vista->mostrarAcceso();
    }

   
    public function iniciarSesion() {
        
        if (!isset($_POST['usuario']) || empty($_POST['usuario'])) {
            return $this->vista->mostrarAcceso('Falta completar el nombre de usuario');
        }
    
        if (!isset($_POST['contrasenia']) || empty($_POST['contrasenia'])) {
            return $this->vista->mostrarAcceso('Falta completar la contraseña');
        }
    
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];
    
        // Verificar que el usuario está en la base de datos
        $usuarioBD = $this->modelo->obtenerUsuario($usuario);
        var_dump($usuarioBD); 

        if($usuarioBD && password_verify($contrasenia, $usuarioBD->contrasenia)){
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['id_usuario'] = $usuarioBD->id_usuario;
            $_SESSION['usuario'] = $usuarioBD->usuario;
            $_SESSION['LAST_ACTIVITY'] = time();
    
            header('Location: ' . BASE_URL);

        } else {
            return $this->vista->mostrarAcceso('Credenciales incorrectas');
        }
    }

    public function cerrarSesion() {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se buscó
        header('Location: ' . BASE_URL);
    }
}

