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
   public function deleteUserId($id)
   {
      header('Content-Type: application/json');

      error_log("Attempting to delete user with ID: $id");

      $result = $this->person->deleteUser($id);


      if ($result) {
         http_response_code(200);
         echo json_encode(['message' => 'User deleted successfully']);
      } else {
         http_response_code(404);
         echo json_encode(['message' => 'User not found or failed to delete']);
      }

      exit();
   }



}