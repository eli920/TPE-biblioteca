<?php

class AutentVista {
    private $usuario = null;

    public function mostrarAcceso($error= '') {
        require 'templates/form.acceso.phtml';
    }


}