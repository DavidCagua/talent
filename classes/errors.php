<?php

class ErrorsMessage{
    //ERROR|SUCCESS
    //Controller
    //method
    //operation
    
    //const ERROR_ADMIN_NEWCATEGORY_EXISTS = "El nombre de la categoría ya existe, intenta otra";
    const ERROR_SIGNUP_NEWUSER_EMAIL_ERROR      = "8f48a0845b4f8704cb7e8b00d4981233";
    const ERROR_SIGNUP_NEWUSER_USERNAME_ERROR             = "8f48a0845b4f8704cb7e8b00d4981231";
    const ERROR_SIGNUP_NEWUSER_PHONE_ERROR             = "8f48a0845b4f8704cb7e8b00d4981221";
    const ERROR_SIGNUP_NEWUSER_PASSWORD_ERROR             = "8f48a0845b4f8704cb7e8b00d4281221";
    const ERROR_SIGNUP_NEWUSER_EMPTY             = "a5bcd7089d83f45e17e989fbc86003ed";
    const ERROR_SIGNUP_NEWUSER_EXISTS            = "a74accfd26e06d012266810952678cf3";
    const ERROR_LOGIN_AUTHENTICATE_DATA            = "a74accfd26e06d012266810952678cff";
    


    private $errorsList = [];

    public function __construct()
    {
        $this->errorsList = [
            ErrorsMessage::ERROR_SIGNUP_NEWUSER_EMAIL_ERROR => 'Formato de email no valido',
            ErrorsMessage::ERROR_SIGNUP_NEWUSER_USERNAME_ERROR => 'El nombre de usuario no es valido solo debe contener letras',
            ErrorsMessage::ERROR_SIGNUP_NEWUSER_PHONE_ERROR => 'El numero de telefono de usuario no es valido debe tener formato +XXXXXXXXX',
            ErrorsMessage::ERROR_SIGNUP_NEWUSER_PASSWORD_ERROR => 'Contraseña invalida, debe tener al menos 6 caracteres,incluyendo ( *, ., - )',
            ErrorsMessage::ERROR_SIGNUP_NEWUSER_EMPTY      => 'Los campos no pueden estar vacíos',
            ErrorsMessage::ERROR_SIGNUP_NEWUSER_EXISTS     => 'El email de ya existe, selecciona otro',
            ErrorsMessage::ERROR_LOGIN_AUTHENTICATE_DATA     => 'El email de ya existe, selecciona otro',
        ];
    }

    function get($hash){
        return $this->errorsList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->errorsList)){
            return true;
        }else{
            return false;
        }
    }
}
?>