<?php

/**
 * @author Offdark
 * @copyright 2013
 */

        
    class Session {
            
        private $logged_in = false;
        public $users_id;
        public $username;
        public $access_level;
       // public $finger_code;    
        function __construct(){
            session_start();      
            $this->check_logged_in();
        }
            
        private function check_logged_in(){
            if (isset($_SESSION['users_id']) && isset($_SESSION['username']) && isset($_SESSION['access_level'])){
            //isset($_SESSION['HTTP_USER_AGENT']) == sha1($_SERVER['HTTP_USER_AGENT'])){     
                $this->users_id = $_SESSION['users_id'];
                $this->access_level = $_SESSION['access_level'];
                $this->username = $_SESSION['username'];
                $this->logged_in = true;
            } 
            else {
                unset($this->users_id);
                unset($this->access_level);
                unset($this->username);
                $this->logged_in = false; 
            }
        }
        
        public function is_logged_in(){
            return $this->logged_in;
        }
        
            
        public function logged_in($user){
            if($user){
                session_regenerate_id(true);
                $this->users_id = $_SESSION['users_id'] = $user->getId();
                $this->access_level = $_SESSION['access_level'] = $user->getAccessLevel();
                $this->username = $_SESSION['username'] = $user->getUsername();
               // $this->finger_code = rand();
                //$_SERVER['HTTP_USER_AGENT'] = sha1($_SESSION['HTTP_USER_AGENT']);
                $this->logged_in = true;
            }
        }
        
        public function logout(){
            unset($_SESSION['users_id']);
            unset($_SESSION['access_level']);
            unset($_SESSION['username']);
            unset($_SESSION['HTTP_USER_AGENT']);
            unset($this->users_id);
            unset($this->access_level);
            unset($this->username);
            //unset($this->finger_code);
            session_destroy();
            header( 'Location: http://localhost/mc/index.php' );
        }
        
    }
    
    $session = new Session();

?>