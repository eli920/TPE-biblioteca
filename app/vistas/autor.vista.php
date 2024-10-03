<?php
class AutorVista {
    public function mostrarAutores($autores) {

        $cantidad = count($autores);
        var_dump($autores);
   
    }

    public function mostrarError($error) {
        require 'msg.error.phtml';
    }
}