<!-- 
    libros     mostrarILibros()
    libro:/id   mostrarLibro(:id)
    autores      mostrarAutores()
    libros:/autor   mostrarLibrosPorAutor(:autor)
    
-->

<?php
require_once 'app/controladores/libro.controlador.php';
require_once 'app/controladores/autor.controlador.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$accion = 'libros'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $accion = $_GET['action'];
}


$parametros = explode('/', $accion);

switch ($parametros[0]) {
    case 'libros':
        $controlador = new LibroControlador();
        $controlador->mostrarLibros();
        break;
    case 'libro':
        $controlador = new LibroControlador();
        $controlador->mostrarLibro($parametros[1]);
        break;
    case 'autores':
       $controlador = new AutorControlador();
       $controlador->mostrarAutores();
        break;
    case 'libros_autor':
        $controlador = new LibroControlador();
        $controlador->mostrarLibrosPorAutor($parametros[1]);
        break;
    case 'listar_libros':
        $controlador = new LibroControlador();
        $controlador->listarLibros();
        break;
    case 'nuevo_libro':
        $controlador = new LibroControlador();
        $controlador->agregarLibro();
        break;
    case 'eliminar_libro':
        $controlador = new LibroControlador();
        $controlador->eliminarLibro($parametros[1]);
        break;
    case 'editar_libro':
        $controlador = new LibroControlador();
        $controlador->editarLibro($parametros[1]);
        break;
    case 'listar_autores':
        $controlador = new AutorControlador();
        $controlador->listarAutores();
        break;
    case 'nuevo_autor':
        $controlador = new AutorControlador();
        $controlador->agregarAutor();
        break;
    case 'eliminar_autor':
        $controlador = new AutorControlador();
        $controlador->eliminarAutor($parametros[1]);
        break;
    case 'editar_autor':
        $controlador = new AutorControlador();
        $controlador->editarAutor($parametros[1]);
        break;
    case 'inicio_sesion':
        echo "HOLAAAAA";
        break;
    default: 
        
        break;
}