<?php
class LibroVista {

    public function mostrarLibros($libros) {

        
        $cantidad = count($libros);
        //var_dump($libros);
        //falta
    }

    public function mostrarLibro($libro) {
        //var_dump($libro);
         // Falta
    }

    public function mostrarError($error) {
        require 'msg.error.phtml';
    }

}