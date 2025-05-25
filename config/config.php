<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//Definir URL base da aplicação

define("BASE_URL", "http://localhost/venda/public/");

// Configuração do Data Base
define("DB_HOST", "127.0.0.1");
define("DB_NAME", "db_venda");
define("DB_USER", "root");
define("DB_PASS", "");



// Sistema de autoload das class
spl_autoload_register(function ($classe) {

    if (file_exists('../app/controllers/' . $classe . '.php')) {
        //../app/controllers/HomeController.php
        require_once '../app/controllers/' . $classe . '.php';
    }

    if (file_exists('../app/models/' . $classe . '.php')) {
        require_once '../app/models/' . $classe . '.php';
    }

    if (file_exists('../core/' . $classe . '.php')) {
        require_once '../core/' . $classe . '.php';
        //var_dump($classe);
    }
});
