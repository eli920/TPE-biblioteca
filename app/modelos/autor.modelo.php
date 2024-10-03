<?php
class AutorModelo {
    private $bd;

    public function __construct() {
        $this->bd = new PDO('mysql:host=localhost;dbname=biblioteca_prueba;charset=utf8', 'root', '');
    }

    public function obtenerAutores() {
        $consulta = $this->bd->prepare('SELECT * FROM autor');
        $consulta->execute();

        $autores = $consulta->fetchAll(PDO::FETCH_OBJ); 

        return $autores;
    }

}