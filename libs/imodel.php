<?php
    interface IModel{
        
        public function save($email, $username, $password, $phone);
        public function get($id);
    }
?>