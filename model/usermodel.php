<?php

class UserModel extends Model implements IModel{

    private $id;
    private $username;
    private $password;
    private $role;
    private $email;
    private $phone;

    public function __construct(){
        parent::__construct();

        $this->username = '';
        $this->password = '';
        $this->role = 'user';
        $this->email = '';
        $this->phone = '';
    }




    public function save($email, $username, $password, $phone){
      try{
        $data = $this->connect();
        $user= new stdClass();
        $user->email=$email;
        $user->username=$username;
        $user->password=$password;
        $user->phone=$phone;
        $user->role="user";
        if (empty($data)){
          error_log("Could not insert data!");
        } else {  
          $data->users->$username=$user;
          $newDataString=json_encode($data);
          file_put_contents('dbjson.json', $newDataString);
        }
        return true;
      }catch(PDOException $e){
            echo $e;
            // return false;
      }
    } 


    public function get($username){
        try{
            $data = $this->connect()->users;
            if($data->$username){
              return $data->$username;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function exists($username){
        try{
            $data = $this->connect()->users;
            if($data->$username){
              return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function from($data){
        $this->username = $data->username;
        $this->password = $data->password;
    }

    private function getHashedPassword($password){
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }

    public function setUsername($username){ $this->username = $username;}
    public function setPassword($password, $hash = true){ 
        if($hash){
            $this->password = $this->getHashedPassword($password);
        }else{
            $this->password = $password;
        }
    }
    public function setId($id){             $this->id = $id;}
    public function setRole($role){         $this->role = $role;}
    public function setEmail($email){     $this->email = $email;}
    public function setPhone($phone){       $this->phone = $phone;}

    public function getId(){        return $this->id;}
    public function getUsername(){  return $this->username;}
    public function getPassword(){  return $this->password;}
    public function getRole(){      return $this->role;}
    public function getEmail(){    return $this->email;}
    public function getPhone(){     return $this->phone;}
}

?>