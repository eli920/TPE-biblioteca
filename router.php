<!-- 
    libros     mostrarILibros()
    libro:/id   mostrarLibro(:id)
    autores      mostrarAutores()
    libros:/autor   mostrarLibrosPorAutor(:autor)
    
-->

<?php
require_once 'app/controladores/libro.controlador.php';
require_once 'app/controladores/autor.controlador.php';
require_once 'app/controladores/autent.controlador.php';
require_once 'app/bibliotecas/respuesta.php';
require_once 'app/softwIntermedios/autent.intermedia.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Respuesta();

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
        // autentIntermedia($res);
        $controlador = new LibroControlador();
        $controlador->listarLibros();
        break;
    case 'mostrar_formulario_libro':
        // autentIntermedia($res);
        $controlador = new LibroControlador();
        $controlador->mostrarFormulario();
        break;    
    case 'nuevo_libro':
        // autentIntermedia($res);
        $controlador = new LibroControlador();
        $controlador->agregarLibro();
        break;
    case 'eliminar_libro':
        // autentIntermedia($res);
        $controlador = new LibroControlador();
        $controlador->eliminarLibro($parametros[1]);
        break;
    case 'editar_libro':
        // autentIntermedia($res);
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
    case 'mostrar_acceso':
        $controlador = new AutentControlador();
        $controlador->mostrarAcceso();
        break;
    case 'iniciar_sesion':
        $controlador = new AutentControlador();
        $controlador->iniciarSesion();
        var_dump("hola");
        break;
    case 'cerrar_sesion':
        $controlador = new AutentControlador();
        $controlador->cerrarSesion();
    
    break;
    default: 
        
        break;
}