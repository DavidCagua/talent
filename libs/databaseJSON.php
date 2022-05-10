<?php

class Database{

    private $db;

    public function __construct(){
        $this->db = constant('DB');
    }

    function connect(){
        try{
            $str = file_get_contents('dbjson.json');
            $json = json_decode($str);
            return $json;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }

}

?>