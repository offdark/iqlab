<?php

/**
 * @author Offdark
 * @copyright 2014
 */

        
    class Session {
            
        private $logged_in = false;
        public $users_id;
        public $realName;
        public $role;
          
        function __construct(){
            session_start();      
            $this->check_logged_in();
        }
            
        private function check_logged_in(){
            
            if ( isset($_SESSION['users_id']) && isset($_SESSION['realName']) && isset($_SESSION['role']) ){    
                
                $this->users_id = $_SESSION['users_id'];
                $this->role = $_SESSION['role'];
                $this->realName = $_SESSION['realName'];
                $this->logged_in = true;
            } 
            else {
                unset($this->users_id);
                unset($this->role);
                unset($this->realName);
                $this->logged_in = false; 
            }
        }
        
        public function is_logged_in(){
            return $this->logged_in;
        }
        
            
        public function logged_in($user){
           
            if( isset($user) ){
                
                session_regenerate_id(true);
                $this->users_id  = $_SESSION['users_id'] = $user->id;
                $this->role      = $_SESSION['role']     = $user->role;
                $this->realName  = $_SESSION['realName'] = $user->realName;
                $this->logged_in = true;
            }
        }
        
        public function logout(){
            
            unset($_SESSION['users_id']);
            unset($_SESSION['role']);
            unset($_SESSION['realName']);
            unset($_SESSION['HTTP_USER_AGENT']);
            unset($this->users_id);
            unset($this->role);
            unset($this->realName);
            session_destroy();
            header( 'Location: http://localhost/test/chess/index.php' );
        }
        
    }
    
    $session = new Session();

