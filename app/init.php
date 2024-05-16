<?php


 require_once '../app/routes.php';
 Router::get('/test', 'PersonController', 'getAllData');
;