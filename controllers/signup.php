
<?php



class Signup extends SessionController{

    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->errorMessage = '';
        $this->view->render('login/signup');
    }

    function newUser(){
        if($this->existPOST(['username', 'password','email','phone'])){
            
            $username = $this->getPost('username');
            $password = $this->getPost('password');
            $email = $this->getPost('email');
            $phone = $this->getPost('phone');
            
            //validate data
            if($username == '' || empty($username) || $password == '' || empty($password) || $email == '' || empty($email)|| $phone == '' || empty($phone)){
                // error al validar datos
                $this->redirect('signup', ['error' => ErrorsMessage::ERROR_SIGNUP_NEWUSER_EMPTY]);
                return;
            }
            if (!preg_match("/^[a-zA-Z-']*$/",$username)) {
                $this->redirect('signup', ['error' => ErrorsMessage::ERROR_SIGNUP_NEWUSER_USERNAME_ERROR]);
                return;
            }
            if(!preg_match("/\+([0-9]{9})/", $phone)){
              $this->redirect('signup', ['error' => ErrorsMessage::ERROR_SIGNUP_NEWUSER_PHONE_ERROR]);
              return;
            }

            if(!preg_match("/[a-zA-Z0-9_\-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/", $email)){
              $this->redirect('signup', ['error' => ErrorsMessage::ERROR_SIGNUP_NEWUSER_EMAIL_ERROR]);
              return;
            }
            if(!preg_match("/^((?=.*\.)(?=.*[A-Z])(?=.*\-)(?=.*\*).{6,})$/", $password)){
              $this->redirect('signup', ['error' => ErrorsMessage::ERROR_SIGNUP_NEWUSER_PASSWORD_ERROR]);
              return;
            }


            $user = new UserModel();
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setEmail($email);
            $user->setPhone($phone);
            $user->setRole("user");
            if($user->exists($username)){;
                $this->redirect('signup', ['error' => ErrorsMessage::ERROR_SIGNUP_NEWUSER_EXISTS]);
            }else if($user->save($email, $username, $password, $phone)){
                $this->redirect('login', ['success' => SuccessMessage::SUCCESS_SIGNUP_NEWUSER]);
            }else{
                $this->redirect('signup', ['error' => ErrorsMessage::ERROR_SIGNUP_NEWUSER]);
            }
        }else{
            // error, cargar vista con errores
            $this->redirect('signup', ['error' => ErrorsMessage::ERROR_SIGNUP_NEWUSER_EXISTS]);
        }
    }
}

?>