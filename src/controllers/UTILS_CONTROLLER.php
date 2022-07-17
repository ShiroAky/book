<?php

    // Crear namespace
    namespace Shiro\Book\Controllers;

    // Usar namespaces
    use Shiro\Book\App\Render;

    // Clase de las utilidades
    class UTILS_CONTROLLER {

        // Crear método para parsear los parámetros de la URL
        public static function url_parse(array $parse_url) {

            // Eliminar el primer elemento del array
            array_shift($parse_url);
            array_shift($parse_url);

            // Retornar los parámetros
            return $parse_url;

        }

        // Crear método para obtener la ruta de la base de datos
        public static function get_db_content() {

            // Obtener la ruta de la base de datos
            $db_content = file_get_contents('./src/database/database.json', true);

            // Retornar la ruta de la base de datos
            return $db_content;

        }
        
        // Crear método para obtener un solo elemento de la base de datos
        public static function get_db_content_item(int $token) {

            // Obtener la ruta de la base de datos
            $db_content = file_get_contents('./src/database/database.json', true);

            // Parsear la ruta de la base de datos
            $db_content = json_decode($db_content, true);

            $id = array_search($token, array_column($db_content, 'token'));

            if ($id !== false) {

                // Retornar el elemento de la base de datos
                return $db_content[$id];

            } else {

                // Retornar un elemento vacío
                return false;

            }
            
        }

    }