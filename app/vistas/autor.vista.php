<?php
class AutorVista {
    public function mostrarAutores($autores) {

        $cantidad = count($autores); //No se utiliza, por el momento
        require 'templates/lista.autores.phtml';
   
    }

    public function mostrarError($error) {
        require 'msg.error.phtml';
    }

    public function mostrarListaAutores($autores) {
        require 'templates/listar.autores.phtml';
    }

}