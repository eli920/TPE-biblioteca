<?php 
require_once ('./app/modelos/libro.modelo.php');
require_once ('./app/vistas/libro.vista.php');

class LibroControlador{
    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo= new LibroModelo();
        $this->vista= new LibroVista();
    }
    
    public function mostrarLibros(){
        $libros= $this->modelo->obtenerLibros();

        if(!empty($libros))
            return $this->vista->mostrarLibros($libros);
        else
            return $this->vista->mostrarError('No se encontró');
           
    }
    
    public function mostrarLibro($id){

        $libro= $this->modelo->obtenerLibro($id);

        if(!$libro)
            return $this->vista->mostrarError('No se encontró');
        else
            return $this->vista->mostrarLibros($libro);
    }
    
    /*public function mostrarLibrosPorAutor($id_autor){

        $libros= $this->modelo->obtenerLibrosPorAutor($id_autor);


        if(!empty($libros))
            return $this->vista->mostrarLibros($libros);
        else
            return $this->vista->mostrarError('No se encontró');
        
            
    }*/
}
