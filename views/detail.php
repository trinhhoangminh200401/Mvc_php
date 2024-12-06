 <?php
    require_once __DIR__ . '/../views/partials/header.php';
    require_once __DIR__ . '/../views/partials/navigate.php';

 foreach ($data['user'] as $key => $value) {
    print_r($value['personName']);
 }
    ?>