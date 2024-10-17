<?php 
require_once 'app/modelos/libro.modelo.php';
require_once 'app/modelos/autor.modelo.php';
require_once 'app/vistas/libro.vista.php';

class LibroControlador{
    private $modelo;
    private $vista;
    private $modeloAutores; //Creo una variable para guardar los autores que me traigo en un arreglo

    public function __construct($res = null) {
        $this->modelo= new LibroModelo();
        $this->vista= new LibroVista($res ? $res->usuario: null);
        $this->modeloAutores= new AutorModelo();
    }
   
    public function mostrarLibros(){
        $libros= $this->modelo->obtenerLibros();
        $autores = $this->modeloAutores->obtenerAutores();

        foreach ($libros as $libro) {
            foreach($autores as $aux){
                if($aux->id_autor == $libro->id_autor){
                    $libro->autor = $aux;
                }
            }
        }

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
        $autores=$this->modeloAutores->obtenerAutores();

        foreach ($libros as $libro) {
            foreach($autores as $aux){
                if($aux->id_autor == $libro->id_autor){
                    $libro->autor = $aux;
                }
            }
        }
       
        if(!empty($libros))
            return $this->vista->mostrarLibros($libros);
        else
            return $this->vista->mostrarError('No se encontró');
            
    }

    public function listarLibros(){
        $libros= $this->modelo->obtenerLibros();
        $autores = $this->modeloAutores->obtenerAutores();

        foreach ($libros as $libro) {
            foreach($autores as $aux){
                if($aux->id_autor == $libro->id_autor){
                    $libro->autor = $aux;
                }
            }
        }

        if(!empty($libros))
            return $this->vista->mostrarListaLibros($libros);
        else
            return $this->vista->mostrarError('No se encontró');
           
    }

    public function agregarLibro() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
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
            $autor = $_POST['id_autor'];
            
            $id=$this->modelo->insertarLibro($titulo, $genero, $editorial, $anio_publicacion, $sinopsis, $autor);
            header('Location: ' . BASE_URL . 'listar_libros');
        }else{
            $this->mostrarFormulario();
        }
    } 

    public function eliminarLibro($id) {
        $libro = $this->modelo->obtenerLibro($id);
        
        if (!$libro) {
            return $this->vista->mostrarError("No existe el libro con el id=$id");
        }

        $this->modelo->borrarLibro($id);

        header('Location: ' . BASE_URL . 'listar_libros');
    }

    public function editarLibro($id) {
        $libro = $this->modelo->obtenerLibro($id);

        if (!$libro) {
            return $this->vista->mostrarError("No existe el libro");
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Si el formulario ha sido enviado
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
            //Obtengo los nuevos valores
            $titulo = $_POST['titulo'];
            $genero = $_POST['genero'];
            $editorial = $_POST['editorial'];
            $anio_publicacion = $_POST['anio_publicacion'];
            $sinopsis = $_POST['sinopsis'];
            $autor = $_POST['id_autor'];

            // actualiza el libro
            $this->modelo->actualizarLibro($id, $titulo, $genero, $editorial, $anio_publicacion, $sinopsis, $autor);

            header('Location: ' . BASE_URL . 'listar_libros');
        }else{
            $this->mostrarFormulario($libro); // Muestra el formulario con los datos del libro
        }
    }

    //  Nos trae los autores al formulario de libros para poder seleccionar a que autor corresponde el libro que estamos agregando.
    public function mostrarFormulario($libro = null){
        $autores = $this->modeloAutores->obtenerAutores();
        $this->vista->mostrarForm($autores, $libro);
    }
    
}
