<?php
    
/**
* @author Offdark
* @copyright 2013
*/
    
    class User {
        
        public $id;
        public $email;
        public $login;
        private $hashed_password;
        private $old_hashed_password;
        public $status;
        public $realName;
        public $points;
        public $edited;
        public $role;


        function setPassword($password){
            $this->hashed_password = sha1(sha1($password));
        }

        function setHashedPassword($hashed_password){
            $this->hashed_password = $hashed_password;
        }

        function getHashedPassword(){
            return $this->hashed_password;
        }

        function setOldPassword($old_password){
            $this->old_hashed_password = sha1(sha1($old_password));
        }

        function setOldHashedPassword($old_hashed_password){
            $this->old_hashed_password = $old_hashed_password;
        }

        function getOldHashedPassword(){
            return $this->old_hashed_password;
        }

    }

?>
