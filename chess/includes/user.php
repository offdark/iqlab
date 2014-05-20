<?php
    
/**
* @author Offdark
* @copyright 2013
*/
    
    class User {
        
        private $id;
        private $email;
        private $login;
        private $heshed_password;
        private $old_heshed_password;
        private $status;
        private $reallName;
        private $points;
        private $edited;
        private $role;
    
        
        function setId($id){
            $this->id = $id;
        }
        function getId(){
            return $this->id;
        }
        
        
        function setUsername($username){
            $this->username = $username;
        }
        function getUsername(){
            return $this->username;
        }
       
        
        function setPassword($password){
            $this->heshed_password = sha1(sha1($password));
        }
        function setHeshedPassword($heshed_password){
            $this->heshed_password = $heshed_password;
        }
        function getHeshedPassword(){
            return $this->heshed_password;
        }
        
        function setOldPassword($old_password){
            $this->old_heshed_password = sha1(sha1($old_password));
        }
        
        function setOldHeshedPassword($old_heshed_password){
            $this->old_heshed_password = $old_heshed_password;
        }
        function getOldHeshedPassword(){
            return $this->old_heshed_password;
        }
        
        function setLoginName($login_name){
            $this->login_name = $login_name;
        }
        function getLoginName(){
            return $this->login_name;
        }
        
        
        function setAccessLevel($access_level){
            $this->access_level = $access_level;
        }
        function getAccessLevel(){
            return $this->access_level;
        }
        
        
        function setUnit($unit){
            $this->unit = $unit;
        }
        function getUnit(){
            return $this->unit;
        }
        
         function setAccount($account){
            $this->account = $account;
        }
        function getAccount(){
            return $this->account;
        }
        
        
    }
    
    ?>