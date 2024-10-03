<?php
class LibroModelo{
    protected $bd;

    public function __construct() {
        $this->bd = new PDO('mysql:host=localhost;dbname=biblioteca_prueba;charset=utf8', 'root', '');
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


}