<?php


/**
 * @author Offdark
 * @copyright 2014
 */

  
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
                $STH = $this->DBH->prepare( 'SELECT * FROM user WHERE login_name = ?  AND heshed_password = ? ' );     
                
                 $data = array( $user->getLoginName(), $user->getHeshedPassword() ); //creating query to placeholder
                 $STH->execute( $data );  
                 $STH->setFetchMode( PDO::FETCH_OBJ ); // FetchMODE Object
                 // writing result to User class   
                    $user = new User();      
                    while( $row = $STH->fetch() ) {     
                            $user->setId($row->id);
                            $user->setAccessLevel($row->access_level);
                            $user->setLoginName($row->login_name);
                            $user->setHeshedPassword($row->heshed_password);
                            $user->setUsername($row->username);
                            $user->setUnit($row->unit);
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