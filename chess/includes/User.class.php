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


        public function emailCheck( $table_name, $POST_arr ){
            
            unset($POST_arr['submit']);
            $select = array();

            foreach( $POST_arr as $key => $value ){

                $select[$key] = trim( filter_var( $value, FILTER_VALIDATE_EMAIL ) );
            }
            
            try{
                
                $STH = MYSQLDb::select( 'id', $table_name, $select );           
                $this->id = $STH->fetch();
            }
            catch ( PDOException $e ) { echo '<br> cant get id  from  _DB: '. $e->getMessage(); DIE(); }

           return $this->id; //return user ID
        }


        public function updatePassword( $POST_arr, $id_int ){

            unset($POST_arr['submit']);
            $data = array();

            foreach( $POST_arr as $key => $value ){

                $data[$key] = trim( htmlspecialchars( $value ) );
            }

            print_r($data);
            DIE();
            try{

                $STH = MYSQLDb::select( $data, $this->table_name, $id_int );
                // writing result to User class
                foreach( $STH->fetch() as $key => $value){

                    $this->$key = $value;
                }
            }
            catch ( PDOException $e ) { echo '<br> cant get id  from  _DB: '. $e->getMessage(); DIE(); }

           // if( $data[])


        }
    
    
    }


