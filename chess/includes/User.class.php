<?php
    
/**
* @author Offdark
* @copyright 2014
*/

    
    class User {
        
        public $id;
        public $email;
        public $login;
        public $hashed_password;
        private $old_hashed_password;
        public $status;
        public $realName;
        public $points;
        public $created;
        public $edited;
        public $role;
        
        public $secretQ = array( 'secretQ1', 'secretQA1', 'secretQ2', 'secretQA2' );
        public static  $table_name = 'user';


        function setHashedPassword($password){
            $this->hashed_password = sha1(sha1($password));
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
                     foreach( $STH->fetch() as $key => $value){
                        
                        $this->$key = $value;
                     }
             }
             catch ( PDOException $e ) { echo '<br> cant get user  from  _DB: '. $e->getMessage(); DIE(); }
        }

        public static function add( $object ){
            
            $STH = MYSQLDb::getDBH()->prepare( 'SELECT login, email FROM user WHERE login = ?  OR email = ?' );   
            $data = array( $object->login, $object->email ); //creating query to placeholder
            $STH->execute( $data );          
           
                if( $STH->rowCount() == 0 ){

                    try{
                        MYSQLDb::insert( self::$table_name, $object  );  // Inserting new USER to DB
                        $flag = true;
                    }
                    catch ( PDOException $e ) {  echo '<br> cant add value to  _DB: '. $e->getMessage(); DIE(); }
                    
                }else{
                    $flag = false;
                }    
                
            return $flag; 
        }
        
        public static function reset_password(){
            
            
            
        }
    
    
    }


