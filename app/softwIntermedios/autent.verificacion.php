<?php
    function verifiAutentIntermedia($res) {
        if($res->usuario) {
            return;
        } else {
            header('Location: ' . BASE_URL . 'mostrar_acceso');
            die();
        }
    }
?>
