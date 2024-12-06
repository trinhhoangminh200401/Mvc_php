<?php
require_once(__DIR__ . '/../helpers/Database.php');
 class Model {
   
    private $pdo;
    protected $table;
    function __construct($pdo)
    {
       $this -> pdo = $pdo;
        
    }
    public function getALLData(){
      $query = "SELECT * FROM {$this->table}";
      return $this->pdo->select($query); 
    }
   public function getDataId($id)
   {
      $query = "SELECT * FROM {$this->table} WHERE id = :id";
      $params = [':id' => $id]; 
      return $this->pdo->select($query, $params);
   }
 
 }
?>