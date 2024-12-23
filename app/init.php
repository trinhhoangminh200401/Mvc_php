<?php



require_once(__DIR__ . '/routes.php');
require_once(__DIR__.'/../controller/personcontroller.php');

Router::get('/', 'PersonController', 'getAllData');
Router::get('/home', 'PersonController', 'getAllData');
Router::get('/id/{id}','PersonController', 'getUserId');
Router::delete('/user/{id}', 'PersonController', 'deleteUserId');

