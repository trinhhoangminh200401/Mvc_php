 <?php
    require_once __DIR__ . '/../views/partials/header.php';
    require_once __DIR__ . '/../views/partials/navigate.php';

if(!empty($data['user'])){
  
        foreach ($data['user'] as $key => $value) {
            print_r($value['personName']);
        }
} else {
?>
<h1 style="text-align: center; color: red;"><?= 'Fail not find Id detail'?></h1>

<?php  } ?>