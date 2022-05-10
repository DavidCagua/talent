<?php

class LoginModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function login($username, $password){
        // insertar datos en la BD
        error_log("login: inicio");
        try{
            $data = $this->connect();
            if($data->users){
                $data=$data->users->$username;
                if($data){
    
                    $user = new UserModel();
                    $user->from($data);
    
                    error_log('login: user id '.$password.$user->getPassword());
    
                    if($password== $user->getPassword()){
                        error_log('login: success');
                        //return ['id' => $item['id'], 'username' => $item['username'], 'role' => $item['role']];
                        return $user;
                        //return $user->getId();
                    }else{
                        return NULL;
                    }
                }
            }
        }catch(PDOException $e){
            return NULL;
        }
    }

    

}

?>