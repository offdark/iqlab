<?php
    
/**
* @author Offdark
* @copyright 2014
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
        public static  $table_name = 'user';


        function setHashedPassword($password){
            $this->hashed_password = sha1(sha1($password));
        }
        
        public function getHashedPassword(){
            
            return $this->hashed_password;
        }

        function setOldPassword($old_password){
            $this->old_hashed_password = sha1(sha1($old_password));
        }

        
        public function login( $login, $hashed_password ){
            
            //Getting all information from DB if user exists 
            try{            
                 $STH = MYSQLDb::getDBH()->prepare( 'SELECT * FROM user WHERE login = ?  AND hashed_password = ? ' );

                 $data = array( $login, $hashed_password ); //creating query to placeholder
                 $STH->execute( $data );  
                 $STH->setFetchMode( PDO::FETCH_OBJ ); // FetchMODE Object

                 // writing result to User class
                    while( $row = $STH->fetch() ) {     
                            $this->id       = $row->id;
                            $this->email    = $row->email;
                            $this->login    = $row->login;
                            $this->status   = $row->status;
                            $this->realName = $row->realName;
                            $this->points   = $row->points;
                            $this->edited   = $row->edited;
                            $this->role     = $row->role;
                            $this->login = $row->login;
                            $this->hashed_password = $row->hashed_password;
                    }
             }
             catch ( PDOException $e ) {    echo '<br> cant get user  from  _DB: '. $e->getMessage(); DIE();    }
        }

        public static function add( $object ){

            // Inserting new USER to DB
            try{

                 MYSQLDb::insert( self::$table_name, $object  );

            }
            catch ( PDOException $e ) {    echo '<br> cant insert values to  _DB: '. $e->getMessage(); DIE();    }
        }
    }


