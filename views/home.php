 <?php
   require_once __DIR__ . '/../views/partials/header.php';
   require_once __DIR__ . '/../views/partials/navigate.php';



   ?>

 <main>

    <?php
      $dataName = $data;

      //   var_dump($dataName);
      foreach ($dataName['data'] as $item) {
         // Accessing array elements using keys

      ?>
       <div>
          <h3><?= $item['personName'] ?></h3>
          <a href="#" class="btn-onclick-delete" data-id="<?= $item['id'] ?>">Delete User</a>
       </div>


    <?php } ?>
    <script>
       let btn = document.querySelectorAll('.btn-onclick-delete')
       btn.forEach((item) => item.addEventListener('click', function(e) {
       e.preventDefault()
       let userId = this.getAttribute('data-id');
       if (!confirm('Are you sure you want to delete this user?')) return;

       fetch(`/user/${userId}`, {
             method: 'DELETE',
          })
          .then(response => {
             if (response) {
                console.log(response);
               //  alert('User deleted successfully.');
               //  location.reload();
             } else {
                alert('Failed to delete the user.');
             }
          })
          .catch(error => {
             console.error('Error:', error);
             alert('An error occurred while deleting the user.');
          });
       })
      )
    </script>
 </main>

 <?php
   require_once __DIR__ . '/../views/partials/footer.php'


   ?>