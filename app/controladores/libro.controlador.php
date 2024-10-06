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
            return $this->vista->mostrarLibro($libro);
    }
    
    public function mostrarLibrosPorAutor($id){

        $libros= $this->modelo->obtenerLibrosPorAutor($id);


        if(!empty($libros))
            return $this->vista->mostrarLibros($libros);
        else
            return $this->vista->mostrarError('No se encontró');
        
            
    }

    public function listarLibros(){
        $libros= $this->modelo->obtenerLibros();

        if(!empty($libros))
            return $this->vista->mostrarListaLibros($libros);//Se genera en vista
        else
            return $this->vista->mostrarError('No se encontró');
           
    }

    public function agregarLibro() {
        if (!isset($_POST['titulo']) || empty($_POST['titulo'])) {
            return $this->vista->mostrarError('Falta completar el título');
        }
        if (!isset($_POST['genero']) || empty($_POST['genero'])) {
            return $this->vista->mostrarError('Falta completar el género');
        }
        if (!isset($_POST['editorial']) || empty($_POST['editorial'])) {
            return $this->vista->mostrarError('Falta completar el editorial');
        }
    
        if (!isset($_POST['anio_publicacion']) || empty($_POST['anio_publicacion'])) {
            return $this->vista->mostrarError('Falta completar el año de publicación');
        }
    
        $titulo = $_POST['titulo'];
        $genero = $_POST['genero'];
        $editorial = $_POST['editorial'];
        $anio_publicacion = $_POST['anio_publicacion'];
        $sinopsis = $_POST['sinopsis'];

        $id = $this->modelo->insertarLibro($titulo, $genero, $editorial, $anio_publicacion, $sinopsis);

        header('Location: ' . BASE_URL);
    } 

    public function eliminarLibro($id) {
        //pido el libro
        $libro = $this->modelo->obtenerLibro($id);
        //si no está muestro error
        if (!$libro) {
            return $this->vista->mostrarError("No existe el libro con el id=$id");
        }

        // si está, borro el libro y redirijo
        $this->modelo->borrarLibro($id);

        header('Location: ' . BASE_URL);
    }

    public function editarLibro($id) {
        $libro = $this->modelo->obtenerLibro($id);

        if (!$libro) {
            return $this->vista->mostrarError("No existe el libro con el id=$id");
        }

        // actualiza el libro
        $this->modelo->actualizarLibro($id);

        header('Location: ' . BASE_URL);
    }
}
