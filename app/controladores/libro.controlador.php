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
    
    public function mostrarLibrosPorAutor($id){

        $libros= $this->modelo->obtenerLibrosPorAutor($id);


        if(!empty($libros))
            return $this->vista->mostrarLibros($libros);
        else
            return $this->vista->mostrarError('No se encontró');
        
            
    }

    // public function agregarLibro() {
    //     if (!isset($_POST['titulo']) || empty($_POST['titulo'])) {
    //         return $this->vista->mostrarError('Falta completar el título');
    //     }
    
    //     if (!isset($_POST['año_publicacion']) || empty($_POST['año_publicacion'])) {
    //         return $this->vista->mostrarError('Falta completar la prioridad');
    //     }
    
    //     $titulo = $_POST['titulo'];
    //     $genero = $_POST['genero'];
    //     $editorial = $_POST['editorial'];
    //     $año_publicacion = $_POST['año_publicacion'];
    
    // }

    
}
