<?php

    // Incluir el archivo de configuración
    require_once './src/config/config.php';

    // Usar la clase de configuración
    use Shiro\Book\Config\Config;
    
    // Correr la auto configuración
    Config::autoConfig();

    // Incluye el autoloader de Composer
    require_once "vendor/autoload.php";

    // Correr la aplicación
    require_once "src/app.php";