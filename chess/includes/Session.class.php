<?php

/**
 * @author Offdark
 * @copyright 2014
 */

        
    class Session {
            
        private $logged_in = false;

        private $id;
        private $email;
        private $login;
        private $hashed_password;
        public $status;
        private $realName;
        private $points;
        private $created;
        private $edited;
        public $role;
          
        function __construct(){
            session_start();      
            $this->check_logged_in();
        }
            
        private function check_logged_in(){
            
            if ( isset($_SESSION['id']) && isset($_SESSION['realName']) && isset($_SESSION['role']) ){    
                
                $this->id       = $_SESSION['id'];
                $this->email    = $_SESSION['email'];
                $this->login    = $_SESSION['login'];
                $this->status   = $_SESSION['status'];
                $this->realName = $_SESSION['realName'];
                $this->points   = $_SESSION['points'];
                $this->created  = $_SESSION['created'];
                $this->edited   = $_SESSION['edited'];
                $this->role     = $_SESSION['role'];
                $this->hashed_password = $_SESSION['hashed_password'];
                
                $this->logged_in = true;
            } 
            else {
                unset( $this->id );    
                unset( $this->email);   
                unset( $this->login );      
                unset( $this->status );  
                unset( $this->realName );
                unset( $this->points ); 
                unset( $this->created );      
                unset( $this->edited ); 
                unset( $this->role );         
                unset( $this->hashed_password );     
                
                $this->logged_in = false; 
            }
        }
        
        public function is_logged_in(){
            return $this->logged_in;
        }
        
            
        public function logged_in( $user ){
           
            if( isset( $user ) ){
                
                session_regenerate_id(true);
                
                    foreach( $user as $key => $value ){
                        
                        $this->key = $_SESSION[$key] = $value;                
                    }
                 
                $this->logged_in = true;
            }
        }
        
        public function logout(){

            unset( $this->id );    
            unset( $this->email);   
            unset( $this->login );      
            unset( $this->status );  
            unset( $this->realName );
            unset( $this->created );
            unset( $this->points );       
            unset( $this->edited ); 
            unset( $this->role );         
            unset( $this->hashed_password );
            session_unset();
            session_destroy();
            header( 'Location: http://localhost/test/chess/index.php' );
        }
        
    }
    
    $session = new Session();

