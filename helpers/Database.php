<?php

class Database
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;
    public function __construct()
    {

        $this->connectDB();
    }


    public function  connectDB()
    {
        try {
         
            $this->link = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function select($query,$param=[])
    {
      
     
            $result = $this->link->prepare($query);
            $result->execute($param);
            if ($result->rowCount() > 0) {
                return $result;
            } else {
                return false;
            }
      
     
    }

    // public function insert($query)
    // {
    //     $insert_row = $this->link->query($query) or
    //         die($this->link->error . __LINE__);
    //     if ($insert_row) {
    //         return $insert_row;
    //     } else {
    //         return false;
    //     }
    // }

    // public function update($query)
    // {
    //     $update_row = $this->link->query($query) or
    //         die($this->link->error . __LINE__);
    //     if ($update_row) {
    //         return $update_row;
    //     } else {
    //         return false;
    //     }
    // }

    // public function delete($query)
    // {

    //     try {
    //         $delete_row = $this->link->query($query);

    //         if ($delete_row) {

    //             return $delete_row;
    //         } else {

    //             return false;
    //         }
    //     } catch (Exception $e) {

    //         return false;
    //     }
    // }
}
?>