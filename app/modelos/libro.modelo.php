<?php
class LibroModelo{
    private $bd;

    public function __construct() {
        $this->bd = new PDO('mysql:host=localhost;dbname=tpe-biblioteca;charset=utf8', 'root', '');
    }

    public function obtenerLibros() {

        $consulta = $this->bd->prepare('SELECT * FROM libro');
        $consulta->execute();
    
        $libros = $consulta->fetchAll(PDO::FETCH_OBJ); 
    
        return $libros;
    }
 
    public function obtenerLibro($id) {    
        $consulta = $this->bd->prepare('SELECT * FROM libro WHERE id = ?');
        $consulta->execute([$id]);   
    
        $libro = $consulta->fetch(PDO::FETCH_OBJ);
    
        return $libro;
    }

}