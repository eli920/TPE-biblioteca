<?php
class AutorVista {
    public function mostrarAutores($autores) {

        $cantidad = count($autores); //No se utiliza, por el momento
        require 'templates/lista.autores.phtml';
   
    }

    public function mostrarAutor($autor) {
        require 'templates/mostrar.autor.phtml';
    }

    public function mostrarError($error) {
        require 'templates/msg.error.phtml';
     }

    public function mostrarListaAutores($autores) {
        require 'templates/listar.autores.phtml';
    }

    public function mostrarForm($autor = null) {
        require 'templates/formulario.autor.phtml';
    }

}