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
    case 'autor'://Se agrega case, para poder obtener un autor y usar la funcion para editar
        $controlador = new AutorControlador();
        $controlador->mostrarAutor($parametros[1]);
        break;
    case 'libros_autor':
        $controlador = new LibroControlador();
        $controlador->mostrarLibrosPorAutor($parametros[1]);
        break;
    case 'listar_libros':
        autentIntermedia($res);
        $controlador = new LibroControlador($res);
        $controlador->listarLibros();
        break;
    case 'mostrar_formulario_libro':
        autentIntermedia($res);
        $controlador = new LibroControlador($res);
        $controlador->mostrarFormulario();
        break;    
    case 'nuevo_libro':
        autentIntermedia($res);
        $controlador = new LibroControlador($res);
        $controlador->agregarLibro();
        break;
    case 'eliminar_libro':
        autentIntermedia($res);
        $controlador = new LibroControlador($res);
        $controlador->eliminarLibro($parametros[1]);
        break;
    case 'editar_libro':
        autentIntermedia($res);
        $controlador = new LibroControlador($res);
        $controlador->editarLibro($parametros[1]);
        break;
    case 'listar_autores':
        autentIntermedia($res);
        $controlador = new AutorControlador($res);
        $controlador->listarAutores();
        break;
    case 'mostrar_formulario_autor':
        autentIntermedia($res);
        $controlador = new AutorControlador($res);
        $controlador->mostrarFormulario();
        break; 
    case 'nuevo_autor':
        autentIntermedia($res);
        $controlador = new AutorControlador($res);
        $controlador->agregarAutor();
        break;
    case 'eliminar_autor':
        autentIntermedia($res);
        $controlador = new AutorControlador($res);
        $controlador->eliminarAutor($parametros[1]);
        break;
    case 'editar_autor':
        autentIntermedia($res);
        $controlador = new AutorControlador($res);
        $controlador->editarAutor($parametros[1]);
        break;
    case 'mostrar_acceso':
        $controlador = new AutentControlador();
        $controlador->mostrarAcceso();
        break;
    case 'iniciar_sesion':
        $controlador = new AutentControlador();
        $controlador->iniciarSesion();
        break;
    case 'cerrar_sesion':
        $controlador = new AutentControlador();
        $controlador->cerrarSesion();
    break;
    default: 
        //Falta poner que se va a mostrar por default
    break;
}