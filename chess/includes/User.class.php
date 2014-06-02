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


        public function resetPassword( $POST_arr, $table_name, $id_mixed ){

            unset($POST_arr['submit']);
             $fields = array(); // key -> value in sql string
                
            foreach( $POST_arr as $key => $value ){
                
                $fields[] = $key;        
            }           
         //   print_r($fields);
         //   DIE();
            try{
            $sql = "(user_id = '93') AND (secretQ1 = 'What is the middle name of your oldest child?') AND (secretQA1 = 'best')  AND (secretQ2 = 'In what city or town did your mother and father meet?') AND (secretQA2 = 'mee') ";
                $STH = MYSQLDb::select( 'user_id', $table_name, $sql );
                $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array  
                print_r($STH);
               $data = array();
               
               foreach( $STH->fetch() as $key => $value ){
                
               $data[$key] = $value;
               }      
               echo "<br>";
               print_R($data);
               echo "<br>";
               print_r($fields);
               die();     

            }
            catch ( PDOException $e ) { echo '<br> cant get user_id  from  _DB: '; echo $e->getMessage(); DIE(); }

            if( $fields == $data ){
                
            $string = 'abcdefghijklmnopqrstuvwxyz'.'0123456789!@#$%^&*()'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
            $newPassword = mb_substr( str_shuffle($string), 6, 7 );
            
            echo $newPassword;
            DIE();

            }
            else{
                
                return false;
            }


        }
    
    
    }


