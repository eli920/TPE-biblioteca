<?php
require_once 'config.php';

class AutorModelo {
    private $bd;

    public function __construct() {
        $this->bd = new PDO(
            "mysql:host=".MYSQL_HOST .
            ";dbname=".MYSQL_DB.";charset=utf8", 
            MYSQL_USER, MYSQL_PASS);
            $this->_desplegar();
    }

    private function _desplegar() {
        $consulta = $this->bd->query('SHOW TABLES');
        $tablas = $consulta->fetchAll();
        if(count($tablas) == 0) {
            $sql = <<<END
            END;
            $this->bd->query($sql);
        }
    }

    public function obtenerAutores() {
        $consulta = $this->bd->prepare('SELECT * FROM autor');
        $consulta->execute();

        $autores = $consulta->fetchAll(PDO::FETCH_OBJ); 

        return $autores;
    }

    public function insertarAutor($nombre_apellido, $nacionalidad, $biografia, $imagen_url) {
        $consulta = $this->bd-> prepare('INSERT INTO autor(nombre_apellido, nacionalidad, biografia, imagen_url) VALUES (?, ?, ?, ?)');
        $consulta -> execute([$nombre_apellido, $nacionalidad, $biografia, $imagen_url]);

        $id = $this->bd->lastInsertId();

        return $id;
    }
 
    public function borrarAutor($id) {
        $consulta = $this->bd->prepare('DELETE FROM autor WHERE id_autor = ?');
        $consulta->execute([$id]);
    }

    public function actualizarAutor($id) {        
        $consulta = $this->bd->prepare('UPDATE autor SET nombreApellido = ?, nacionalidad = ?, biografia = ?, imagen_url = ? WHERE id_autor = ?');
        $consulta->execute([$id]);
    }
}