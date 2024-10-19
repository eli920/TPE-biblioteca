<?php
class LibroVista {
    private $usuario = null;

    public function __construct($usuario) {
        $this->usuario = $usuario;
    }

    public function mostrarLibros($libros) {
        // $cantidad = count($libros);
        require 'templates/lista.libros.phtml';
    }

    public function mostrarLibro($libro) {
        require 'templates/mostrar.libro.phtml';
    }

    public function mostrarError($error) {
       require 'templates/msg.error.phtml';
    }

    public function mostrarListaLibros($libros) {
        require 'templates/listar.libros.phtml';
    }

    public function mostrarForm($autores, $libro = null) {
        require 'templates/formulario.libro.phtml';
    }


}