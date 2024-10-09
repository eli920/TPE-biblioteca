<?php
class LibroVista {

    public function mostrarLibros($libros) {
        // $cantidad = count($libros);
        require 'templates/lista.libros.phtml';
    }

    public function mostrarLibro($libro) {
        require 'templates/mostrar.libro.phtml';
    }

    public function mostrarError($error) {
        require 'msg.error.phtml';
    }

    public function mostrarListaLibros($libros) {
        require 'templates/listar.libros.phtml';
    }


}