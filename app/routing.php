<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP method
        ['show', '/item/{id}', 'GET'], // action, url, HTTP method
        ['add', '/add', ['GET','POST']], // action, url, HTTP method
        ['edit', '/edit/{id}', ['GET','POST']], // action, url, HTTP method
        ['delete', '/delete/{id}', 'GET'], // action, url, HTTP method
    ],
];