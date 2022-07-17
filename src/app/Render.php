<?php

    // Crear el namespace de la aplicación
    namespace Shiro\Book\App;

    // Render class
    class Render
    {
        
        // Render view
        public static function view(string $view) 
        {

            // Ajustar los valores de la vista
            $view = str_replace(' ', '', $view);

            if (file_exists('./src/views/' . $view . '.php')) { 
                require_once './src/views/' . $view . '.php'; 
            } else { Render::error(506); }

        }

        // Render error
        public static function error(int $code) 
        {
            // Envio de cabeceras
            http_response_code($code);

            // Envio de la respuesta
            Render::view('error');

        }

        // Render json
        public static function parse_json(string $data) 
        {

            // Parseo del archivo json
            $ouput = json_decode($data, true);

            // Retorno del json
            return $ouput;

        }

    }