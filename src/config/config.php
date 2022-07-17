<?php

    // Crear namespace
    namespace Shiro\Book\Config;

    // Usar namespaces
    use Shiro\Book\Controllers\UTILS_CONTROLLER;
    use Shiro\Book\Controllers\URL_CONTROLLER;

    // Crear clase de configuración
    class Config 
    {

        // Crear método para auto cargar
        public static function autoConfig() {

            // Ocultar los errores
            error_reporting(0);

        }

        // Crear método para almacenar las constantes de la aplicación
        public static function appConfig() 
        {

            // Instancias de las variables de la aplicación
            $_book_token = URL_CONTROLLER::get_params(0);
            $_book_info = UTILS_CONTROLLER::get_db_content_item($_book_token);

            // Crear constantes de la aplicación
            define('BOOK', $_book_info);
            define('BOOK_ID', $_book_token);

            // Retornar las constantes de la aplicación
            if (isset($_book_info) && $_book_info !== false) {
                
                return [
                    'BOOK' => $_book_info,
                    'BOOK_ID' => $_book_token
                ];

            } else {
                return false;
            }
            

        }

    }