<?php


/**
 * @author Offdark
 * @copyright 2014
 */


    class MYSQLDatabase {
        
        private $DBH = null;
        public $user = 'chess_admin';
        public $pass = '123';

        function __construct(){
            $this->init_mysql_connection();   
        }
          
        function init_mysql_connection(){
            //Connecting to DB
            try{
                    $DBH = new PDO( 'mysql:host=localhost;dbname=chess', $this->user, $this->pass );
                    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    $this->DBH = $DBH;           
               }
            catch (PDOException $e) {echo '<br> Cant connect to _DB: ' . $e->getMessage(); DIE();}
        }
        
           
        function login($user){
            //Getting all information from DB if user exists 
            try{                  
                $STH = $this->DBH->prepare( 'SELECT * FROM user WHERE login = ?  AND hashed_password = ? ' );
                
                 $data = array( $user->login, $user->getHashedPassword() ); //creating query to placeholder
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
                            $user->login = $row->login;
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



