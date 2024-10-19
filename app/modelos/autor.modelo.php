<?php
require_once 'app/modelos/base.modelo.php';

class AutorModelo extends ModeloBase{
    public function __construct() {
        parent::__construct();
    }

    public function obtenerAutores() {
        $consulta = $this->bd->prepare('SELECT * FROM autor');
        $consulta->execute();

        $autores = $consulta->fetchAll(PDO::FETCH_OBJ); 
        return $autores;
    }

    public function obtenerAutor($id) {
        $consulta = $this->bd->prepare('SELECT * FROM autor  WHERE id_autor = ?');
        $consulta->execute([$id]);

        $autor = $consulta->fetch(PDO::FETCH_OBJ); 
        return $autor;
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

    public function actualizarAutor($id, $nombre_apellido, $nacionalidad, $biografia, $imagen_url) {    //Se agregan parametros    
        $consulta = $this->bd->prepare('UPDATE autor SET nombre_apellido = ?, nacionalidad = ?, biografia = ?, imagen_url = ? WHERE id_autor = ?');
        $consulta->execute([$nombre_apellido, $nacionalidad, $biografia, $imagen_url, $id]);
    }
}