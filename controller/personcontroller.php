<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../Base/controller.php');
require_once(__DIR__ . '/../helpers/Database.php');
require_once(__DIR__ . '/../model/person.php');

class PersonController extends Controller
{
   private $person;
   private $db;

   public function __construct()
   {
      $this->db = new Database();
      $this->person = new Person($this->db);
   }

   public function getAllData()
   {
      $result = $this->person->getAllData();
      $array = ["data" => $result];
      $this->view('home', $array);
   }

   public function getUserId($id){
      
      $result = $this->person->getDataId($id);
      

      $this->view('detail',[
         'user'=>$result

      ]);

   }
}