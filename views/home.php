 <?php
    require_once __DIR__ .'/../views/partials/header.php';
    require_once __DIR__.'/../views/partials/navigate.php';



    ?>

 <main>

     <?php
        $dataName = $data;

      //   var_dump($dataName);
      foreach ($dataName['data'] as $item) {
         // Accessing array elements using keys
        print_r( $item);
      }
        ?>
 </main>
 <?php
    require_once __DIR__.'/../views/partials/footer.php'


    ?>