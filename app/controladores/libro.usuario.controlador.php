<!-- <?php
// require_once 'app/modelos/libro.usuario.modelo.php';
// require_once 'app/modelos/libro.modelo.php';
// require_once 'app/modelos/autor.modelo.php';
// require_once 'app/vistas/libro.vista.php';
// require_once 'app/bibliotecas/respuesta.php';

// class LibroUsuarioControlador{
//     private $modelo;
//     private $vista;
//     private $modeloAutores;//Creo una variable para guardar los autores que me traigo en un arreglo

//     public function __construct($res) {
//         $this->modelo= new LibroModelo();
//         $this->vista= new LibroVista($res->usuario);
//         $this->modeloAutores= new AutorModelo();
//     }
   

//     public function listarLibros(){
//         $libros= $this->modelo->obtenerLibros();

//         if(!empty($libros))
//             return $this->vista->mostrarListaLibros($libros);//Se genera en vista
//         else
//             return $this->vista->mostrarError('No se encontró');
           
//     }

//     public function agregarLibro() {

//         $this->mostrarFormulario();
    
//         if (!isset($_POST['titulo']) || empty($_POST['titulo'])) {
//             return $this->vista->mostrarError('Falta completar el título');
//         }
//         if (!isset($_POST['genero']) || empty($_POST['genero'])) {
//             return $this->vista->mostrarError('Falta completar el género');
//         }
//         if (!isset($_POST['editorial']) || empty($_POST['editorial'])) {
//             return $this->vista->mostrarError('Falta completar el editorial');
//         }
    
//         if (!isset($_POST['anio_publicacion']) || empty($_POST['anio_publicacion'])) {
//             return $this->vista->mostrarError('Falta completar el año de publicación');
//         }    
    
//         $titulo = $_POST['titulo'];
//         $genero = $_POST['genero'];
//         $editorial = $_POST['editorial'];
//         $anio_publicacion = $_POST['anio_publicacion'];
//         $sinopsis = $_POST['sinopsis'];
//         $autor = $_POST['id_autor'];
        
//         $id=$this->modelo->insertarLibro($titulo, $genero, $editorial, $anio_publicacion, $sinopsis, $autor);
//         header('Location: ' . BASE_URL . 'listar_libros');
//     } 

//     public function eliminarLibro($id) {
//         //pido el libro
//         $libro = $this->modelo->obtenerLibro($id);
//         //si no está muestro error
//         if (!$libro) {
//             return $this->vista->mostrarError("No existe el libro con el id=$id");
//         }

//         // si está, borro el libro y redirijo
//         $this->modelo->borrarLibro($id);

//         header('Location: ' . BASE_URL . 'listar_libros');
//     }

//     public function editarLibro($id) {
       
//         $libro = $this->modelo->obtenerLibro($id);
//         var_dump($id);

//         if (!$libro) {
//             return $this->vista->mostrarError("No existe el libro");
//         }

//         $this->mostrarFormulario($libro); // Muestra el formulario con los datos del libro

//        //Si el formulario ha sido enviado
//         if (!isset($_POST['titulo']) || empty($_POST['titulo'])) {
//             return $this->vista->mostrarError('Falta completar el título');
//         }
//         if (!isset($_POST['genero']) || empty($_POST['genero'])) {
//             return $this->vista->mostrarError('Falta completar el género');
//         }
//         if (!isset($_POST['editorial']) || empty($_POST['editorial'])) {
//             return $this->vista->mostrarError('Falta completar el editorial');
//         }
    
//         if (!isset($_POST['anio_publicacion']) || empty($_POST['anio_publicacion'])) {
//             return $this->vista->mostrarError('Falta completar el año de publicación');
//         } 
//         //Obtengo los nuevos valores
//         $titulo = $_POST['titulo'];
//         $genero = $_POST['genero'];
//         $editorial = $_POST['editorial'];
//         $anio_publicacion = $_POST['anio_publicacion'];
//         $sinopsis = $_POST['sinopsis'];
//         $autor = $_POST['id_autor'];

//         // actualiza el libro
//         $this->modelo->actualizarLibro($id, $titulo, $genero, $editorial, $anio_publicacion, $sinopsis, $autor);

//         header('Location: ' . BASE_URL . 'listar_libros');
//     }

//     //Nos trae los autores al formulario de libros para poder seleccionar a que autor corresponde el libro que estamos agregando.
//     public function mostrarFormulario($libro = null){
//         $autores = $this->modeloAutores->obtenerAutores();
//         $this->vista->mostrarForm($autores, $libro);
//     }
// } 
