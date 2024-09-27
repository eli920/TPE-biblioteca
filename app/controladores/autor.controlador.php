<?php
require_once('./app/modelos/autor.modelo.php');
require_once('./app/vistas/autor.vista.php');
//require_once('libro.controlador.php');

class AutorControlador {
    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new AutorModelo();
        $this->vista = new AutorVista();
    }

    public function mostrarAutores() {
        $autores = $this->modelo->obtenerAutores();

        if(!empty($autores)) {
            return $this->vista->mostrarAutores($autores);
        } else {
            return $this->vista->mostrarError('No se encontró');
        }
    }
}