<?php
require_once 'app/modelos/base.modelo.php';

class UsuarioModelo extends ModeloBase{
    public function __construct() {
        parent::__construct();
    }
 
    public function obtenerUsuario($usuario) {    
        $consulta = $this->bd->prepare("SELECT * FROM usuario WHERE usuario = ?");
        $consulta->execute([$usuario]);
    
        $usuarioObtenido = $consulta->fetch(PDO::FETCH_OBJ);
    
        return $usuarioObtenido;
    }
}