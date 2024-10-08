<?php
require_once 'config.php';

class LibroModelo{
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

    public function obtenerLibros() {

        $consulta = $this->bd->prepare('SELECT * FROM libro');
        $consulta->execute();
    
        $libros = $consulta->fetchAll(PDO::FETCH_OBJ); 
    
        return $libros;
    }
    
    public function obtenerLibro($id) {    
        $consulta = $this->bd->prepare('SELECT * FROM libro WHERE id_libro = ?');
        $consulta->execute([$id]);   
    
        $libro = $consulta->fetch(PDO::FETCH_OBJ);
    
        return $libro;
    }
    
    public function obtenerLibrosPorAutor($id) {
        $consulta = $this->bd->prepare('SELECT * FROM libro WHERE id_autor = ?');
        $consulta->execute([$id]);
    
        $libros = $consulta->fetchAll(PDO::FETCH_OBJ); 
    
        return $libros;
    }  

    public function insertarLibro($titulo, $genero, $editorial, $anio_publicacion, $sinopsis) { 
        $consulta = $this->bd->prepare('INSERT INTO libro(titulo, genero, editorial, anio_publicacion, sinopsis) VALUES (?, ?, ?, ?, ?)');
        $consulta->execute([$titulo, $genero, $editorial, $anio_publicacion, $sinopsis]);
        //Obtengo el ide de la última fila que inserte
        $id = $this->bd->lastInsertId();//Funcion propia de php para obtener último id
    
        return $id;
    }
 
    public function borrarLibro($id) {
        $consulta = $this->bd->prepare('DELETE FROM libro WHERE id_libro = ?');
        $consulta->execute([$id]);
    }

    public function actualizarLibro($id) { //Revisar funcion       
        $consulta = $this->bd->prepare('UPDATE libro SET titulo = ?, genero = ?, editorial = ?, anio_publicacion = ?, sinopsis = ? WHERE id_libro = ?');
        $consulta->execute([$id]);
    }

}