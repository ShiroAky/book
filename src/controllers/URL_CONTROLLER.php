<?php

    // Crear namespace
    namespace Shiro\Book\Controllers;

    // Usar namespaces
    use Shiro\Book\Controllers\UTILS_CONTROLLER;

    // Craer clase para obtener los parámetros de la URL
    class URL_CONTROLLER {

        // Crear método para obtener los parámetros de la URL
        public static function get_params(int $param_number) {

            // Obtener los parámetros de la URL
            $params = explode('/', $_SERVER['REQUEST_URI']);

            // parsear los parámetros de la URL
            $params = UTILS_CONTROLLER::url_parse($params);

            // Retornar los parámetros
            $result = $params[$param_number];
            return $result;

        }

        // Crear método para obtener la URL completa
        public static function get_url() {

            // Sabar si es http o https
            $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
            
            // Obtener la URL completa
            $url = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/';

            // Retornar la URL completa
            return $url;
            
        }

        // Crear método para incluir archivos CSS
        public static function include_css(string $css_file) {

            // Crear la ruta del archivo CSS
            $css_path = 'src/public/css/' . $css_file . '.css';

            // Incluir el archivo CSS
            echo '<link rel="stylesheet" href="' . URL_CONTROLLER::get_url() . $css_path . '" type="text/css">';
            
        }

        // Crear método para incluir archivos JS
        public static function include_js(string $js_file) {

            // Crear la ruta del archivo JS
            $js_path = 'src/public/js/' . $js_file . '.js';

            // Incluir el archivo JS
            echo '<script src="' . URL_CONTROLLER::get_url() . $js_path . '" type="text/javascript"></script>';
            
        }

        // Crear método para incluir archivos php
        public static function module(string $php_file) {

            // Crear la ruta del archivo php
            $php_path = 'src/modules/' . $php_file . '.php';

            // Incluir el archivo php
            require_once $php_path;
            
        }
        
    }