<?php
require_once('./app/modelos/autor.modelo.php');
require_once('./app/vistas/autor.vista.php');

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

    public function listarAutores(){
        $autores= $this->modelo->obtenerAutores();

        if(!empty($autores))
            return $this->vista->mostrarListaAutores($autores);//Se genera en vista
        else
            return $this->vista->mostrarError('No se encontró');
           
    }

    public function agregarAutor() {
        if (!isset($_POST['nombre_apellido']) || empty($_POST['nombre_apellido'])) {
            return $this->vista->mostrarError('Falta completar el nombre y/o apellido');
        }
        if (!isset($_POST['nacionalidad']) || empty($_POST['nacionalidad'])) {
            return $this->vista->mostrarError('Falta completar la nacionalidad');
        }
        if (!isset($_POST['biografia']) || empty($_POST['biografia'])) {
            return $this->vista->mostrarError('Falta completar la biografia');
        }
    
        if (!isset($_POST['imagen_url']) || empty($_POST['imagen_url'])) {
            return $this->vista->mostrarError('Falta completar la url');
        }
    
        $nombre_apellido = $_POST['nombre_apellido'];
        $nacionalidad = $_POST['nacionalidad'];
        $biografia = $_POST['biografia'];
        $imagen_url = $_POST['imagen_url'];

        $id = $this->modelo->insertarAutor($nombre_apellido, $nacionalidad, $biografia, $imagen_url);

        header('Location: ' . BASE_URL);
    } 

    public function eliminarAutor($id) {
        $autor = $this->modelo->obtenerAutor($id);
        if (!$autor) {
            return $this->vista->mostrarError("No existe el autor con el id=$id");
        }
        
        $this->modelo->borrarAutor($id);

        header('Location: ' . BASE_URL);
    }

    public function editarAutor($id) {
        $autor = $this->modelo->obtenerAutor($id);

        if (!$autor) {
            return $this->vista->mostrarError("No existe el autor con el id=$id");
        }
        
        $this->modelo->actualizarAutor($id);

        header('Location: ' . BASE_URL);
    }
}