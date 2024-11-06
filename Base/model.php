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
         $data = $this -> pdo ->select(("SELECT * FROM {$this->table}"));
         $model = $data->fetchAll(PDO::FETCH_OBJ);
         return $model;
    }
 
 }
?>