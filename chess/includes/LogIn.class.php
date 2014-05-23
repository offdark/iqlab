<?php

/**
 * @author Offdark
 * @copyright 2014
 */
 
 
 



 class LogIn {
    
    private $login_name;
    private $password;
    private $check_user;
    private $dbService; 
    private $dbUser; 
    public  $role;
    
    function __construct( $login_name, $password ){

            $this->login_name = (!empty($login_name)) ? trim( htmlspecialchars( $login_name, ENT_QUOTES ) ) : null;
            $this->password   = (!empty($password))   ? trim( htmlspecialchars( $password, ENT_QUOTES ) )   : null;   
        }
        
    function __autoload($class_name) {

        if( file_exists( $class_name. '.class.php') ) {
            require_once( $class_name. '.class.php' );
        } else {
            throw new Exception("Unable to load $class_name.");
        }
    }    
   
        
    function check_user(){
        
        $check_user = new User();
        $check_user->login = $this->login_name;
        $check_user->setPassword($this->password);

        $dbService = new MYSQLDatabase();
        $dbUser = $dbService->login($check_user);
        //Checking

            if( $dbUser->login == $check_user->login &&
                $dbUser->role  == 'admin' &&
                $dbUser->getHashedPassword() == $check_user->getHashedPassword()
              ){
                    $session = new Session();
                    $session->logged_in($dbUser);
                    $this->role = 'admin';
            }
            elseif( $dbUser->login == $check_user->login &&
                    $dbUser->role  == 'user' &&
                    $dbUser->getHashedPassword() == $check_user->getHashedPassword()
                   ){
                        $session = new Session();
                        $session->logged_in($dbUser);
                        $this->role = 'user';
            }
            else{
                $this->role = null;
            }
            
        return $this->role;
    }    
        
 }
 

  
 
 
 