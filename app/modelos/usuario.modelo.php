<?php
// require_once 'config.php';

class UsuarioModelo {
    private $bd;

    public function __construct() {
        $this->bd = new PDO('mysql:host=localhost;dbname=tpe-biblioteca;charset=utf8', 'root', '');
     }
  

    // public function __construct() {
    //     $this->bd = new PDO(
    //         "mysql:host=".MYSQL_HOST .
    //         ";dbname=".MYSQL_DB.";charset=utf8", 
    //         MYSQL_USER, MYSQL_PASS);
    //         $this->_desplegar();
    // }

    // private function _desplegar() {
    //     $consulta = $this->bd->query('SHOW TABLES');
    //     $tablas = $consulta->fetchAll();
    //     if(count($tablas) == 0) {
    //         $sql = <<<END
    //         END;
    //         $this->bd->query($sql);
    //     }
    // }
 
    public function obtenerUsuario($usuario) {    
        $consulta = $this->bd->prepare("SELECT * FROM usuario WHERE usuario = ?");
        $consulta->execute([$usuario]);
    
        $usuarioObtenido = $consulta->fetch(PDO::FETCH_OBJ);
    
        return $usuarioObtenido;
    }
}