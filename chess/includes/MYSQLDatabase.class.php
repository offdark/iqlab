<?php


/**
 * @author Offdark
 * @copyright 2014
 */

function __autoload($class_name) {

    if( file_exists( $class_name. '.class.php' ) ) {
        require_once( $class_name. '.class.php' );
    } else {
        throw new Exception("Unable to load $class_name.");
    }
}

    class MYSQLDatabase {
        
        private $DBH = null;

        function __construct(){
            $this->init_mysql_connection();   
        }
          
        function init_mysql_connection(){
            //Connecting to DB
            try{
                    $DBH = new PDO( 'mysql:host=localhost;dbname=chess',DB_USER, DB_PASS );
                    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    $this->DBH = $DBH;           
               }
            catch (PDOException $e) {echo '<br> Cant connect to _DB: ' . $e->getMessage(); DIE();}
        }
        
           
        function login($user){
            //Getting all information from DB if user exists 
            try{                  
                $STH = $this->DBH->prepare( 'SELECT * FROM user WHERE login_name = ?  AND hashed_password = ? ' );
                
                 $data = array( $user->getLoginName(), $user->getHashedPassword() ); //creating query to placeholder
                 $STH->execute( $data );  
                 $STH->setFetchMode( PDO::FETCH_OBJ ); // FetchMODE Object

                 // writing result to User class
                    $user = new User();
                    while( $row = $STH->fetch() ) {     
                            $user->id       = $row->id;
                            $user->email    = $row->email;
                            $user->login    = $row->login;
                            $user->status   = $row->status;
                            $user->realName = $row->realName;
                            $user->points   = $row->points;
                            $user->edited   = $row->edited;
                            $user->role     = $row->role;
                            $user->setLoginName = $row->login_name;
                            $user->setHashedPassword( $row->hashed_password );
                    }
                    return $user;
                }
            catch ( PDOException $e ) {    echo '<br> cant get user  from  _DB: '. $e->getMessage(); DIE();    }
            }  

        
        function close_connection(){
            $this->DBH = null;
        } 
    }



?>