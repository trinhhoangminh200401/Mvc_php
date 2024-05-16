   <?php 
   require_once '../config/config.php';

   require_once '../Base/controller.php';
   require_once '../helpers/Database.php';
   require_once '../model/person.php';
   class PersonController extends Controller{
      private $person;
      private $db;
      public function __construct()
      {
      $this -> db = new Database();
      $this -> person = new Person($this->db);
      }

      public function getAllData(){
         $result=$this->person->getAllData();
            $array = ["data" => $result, "success" => true];
            $this->view('test',json_encode($array));
      }
      
      
   }

   ?>