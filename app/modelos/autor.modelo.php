<?php
class AutorModelo {
    private $bd;

    public function __construct() {
        $this->bd = new PDO('mysql:host=localhost;dbname=tpe-biblioteca;charset=utf8', 'root', '');
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