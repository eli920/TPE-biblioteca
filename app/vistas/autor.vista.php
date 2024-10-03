<?php
class AutorVista {
    public function mostrarAutores($autores) {

        $cantidad = count($autores);
        require 'templates/lista.autores.phtml';
   
    }

    public function mostrarError($error) {
        require 'msg.error.phtml';
    }
}