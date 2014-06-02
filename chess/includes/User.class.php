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
        public $status;
        public $realName;
        public $points;
        public $created;
        public $edited;
        public $role;
        
        public $lastInsertId;
        public $table_name = 'user';


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

        public function add( $array ){
            
            $data = array();

            foreach( $array as $key => $value ){

                $data[$key] = trim( htmlspecialchars( $value, ENT_QUOTES ) );
            }

            try{

                $result = MYSQLDb::save( $data, $this->table_name );

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

            $data = array();

            foreach( $POST_arr as $key => $value ){

                $data[$key] = trim( htmlspecialchars( $value, ENT_QUOTES ) );
            }

            try{

                MYSQLDb::save( $data, $this->table_name );
                    $this->updateStatus( $data['user_id'] );
  
            }
            catch ( PDOException $e ) {  echo '<br> cant save secretQuestions to  _DB: '. $e->getMessage(); DIE(); }
        }


        public function updateStatus( $id_int ){

            $sql = "id = ".$id_int;
            $set = array( 'status' => 'active' );

            try{

                MYSQLDb::save( $set, 'user', $sql );

            }
            catch ( PDOException $e ) {  echo '<br> cant updateStatus  _DB: '. $e->getMessage(); DIE(); }
        }


        public function emailCheck( $POST_arr ){
            
            unset($POST_arr['submit']);
            $select = array();

            foreach( $POST_arr as $key => $value ){

                $select[$key] = trim( filter_var( $value, FILTER_VALIDATE_EMAIL ) );
            }
            
            try{
                
                $STH = MYSQLDb::select( 'id', $this->table_name, $select ); 
                $STH->setFetchMode( PDO::FETCH_OBJ ); // FetchMODE Object          
                $this->id = $STH->fetch();
            }
            catch ( PDOException $e ) { echo '<br> cant get id  from  _DB: '. $e->getMessage(); DIE(); }

           return $this->id; //return user ID
        }


        public function resetPassword( $POST_arr, $table_name ){

            unset($POST_arr['submit']);

             $fields = array(); // key -> value in sql string
             $data = array();

            foreach( $POST_arr as $key => $value ){

                $fields[] = "(". $key ." = '". $value ."')";
            }
            $sql = implode(' AND ',$fields);

            try{

                $STH = MYSQLDb::select( 'user_id', $table_name, $sql);
                $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array
                $result = $STH->fetch();
                if( !empty( $result ) ){

                    $string = 'abcdefghijklmnopqrstuvwxyz'.'0123456789!@#$%^&*()'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $newPassword = mb_substr( str_shuffle($string), 6, 7 );

                    echo $newPassword;
                    return true;
                }
                else
                {
                   return false;
                }

            }
            catch ( PDOException $e ) { echo '<br> cant get user_id  from  _DB: '; echo $e->getMessage(); DIE(); }
        }

        public function updatePassword( $password_str ){

            $hashed_password = sha1( sha1( $password_str ) );

            try{

                MYSQLDb::save( $hashed_password, $this->table_name, $where );
                $this->updateStatus( $data['user_id'] );

            }
            catch ( PDOException $e ) {  echo '<br> cant save secretQuestions to  _DB: '. $e->getMessage(); DIE(); }
        }
    
    
    }


