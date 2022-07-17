<?php

// Namespaces 
use Shiro\Book\App\Router;
use Shiro\Book\App\Render;

// Rutas
Router::route('/', function () {
    Render::view('index');
});

Router::route('/read/{book}/{id}', function ($book, $id) {
    Render::view('read');
});

Router::route('/detalles/{id}', function ($id) {
    Render::view('detalles');
});

// Correr la aplicación
Router::run();