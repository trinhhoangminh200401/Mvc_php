<?php



require_once(__DIR__ . '/routes.php');
 Router::get('/', 'PersonController', 'getAllData');
    // Router::get('/home/{id}', 'PersonController', 'getid');

;
