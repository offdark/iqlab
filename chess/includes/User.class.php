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
        
        public $lastInsertId;
        public $table_name = 'user';


        function setHashedPassword($password){
            $this->hashed_password = sha1(sha1($password));
        }

        function setOldPassword($old_password){
            $this->old_hashed_password = sha1(sha1($old_password));
        }

        
        public function login( $login, $hashed_password ){
            
            //Getting all information from DB if user exists 
            try{            
                 $STH = MYSQLDb::getDBH()->prepare( "SELECT * FROM user WHERE login = ?  AND hashed_password = ?" );

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

        public function save( $array ){
            
            $data_arr = array();

            foreach( $array as $key => $value ){

                $data_arr[$key] = trim( htmlspecialchars( $value, ENT_QUOTES ) );
            }

            try{

                $result = MYSQLDb::save( $data_arr, $this->table_name );

                if( $result == 0 ){  // Inserting new USER to DB
                    $flag = false;
                }
                else{
                    $this->lastInsertId = $result;
                    $flag = true;
                }
            }
            catch ( PDOException $e ) {  echo '<br> cant add value to  _DB: '. $e->getMessage(); DIE(); }

            return $flag;
        }


        public function saveQuestions( $POST_arr  ){

            $data_arr = array();

            foreach( $POST_arr as $key => $value ){

                $data_arr[$key] = trim( htmlspecialchars( $value, ENT_QUOTES ) );
            }

            try{

                MYSQLDb::save( $data_arr, $this->table_name );
                    $this->updateStatus( $data_arr['user_id'] );
  
            }
            catch ( PDOException $e ) {  echo '<br> cant save secretQuestions to  _DB: '. $e->getMessage(); DIE(); }
        }


        public function updateStatus( $id_int ){

            $sql = "id = ".$id_int;
            $set = array( 'status' => 'active' );

            try{

                MYSQLDb::save( $set, 'user', $sql );

            }
            catch ( PDOException $e ) {  echo '<br> cant updateStatus  _DB: '; $e->getMessage(); DIE(); }
        }


        public static function resetPassword(){
    
        }
    
    
    }


