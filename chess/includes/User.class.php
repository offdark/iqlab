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
        public $new_password;
        public $status;
        public $realName;
        public $points;
        public $created;
        public $edited;
        public $role;
        
        public $lastInsertId;
        public $table_name = 'user';


        public function login( $login, $hashed_password ){

            $sql = "login = '". $login ."'  AND hashed_password = '". $hashed_password ."'"; //creating query to placeholder
            //Getting all information from DB if user exists
            try{
                 $STH = MYSQLDb::select( '*', $this->table_name, $sql);
                 $STH->setFetchMode( PDO::FETCH_OBJ ); // FetchMODE Array

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

            unset($POST_arr['submit']);
            $data = array();

            foreach( $POST_arr as $key => $value ){

                $data[$key] = trim( htmlspecialchars( $value, ENT_QUOTES ) );
            }

        //    print_r($data);
         //   DIE();
            try{

                MYSQLDb::save( $data, $this->table_name );
                if( $this->updateStatus( $data['user_id'] ) != null ){ return true;  }else{ return false; }
            }
            catch ( PDOException $e ) {  echo '<br> cant save secretQuestions to  _DB: '. $e->getMessage(); DIE(); }
        }


        public function updateStatus( $id_int ){

            $sql = "id = ".$id_int;
            $set = array( 'status' => 'active' );

            try{

               return MYSQLDb::save( $set, 'user', $sql );
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
            
         //   echo $sql;
        //    print_r($data);
       //    DIE();
            
            try{

                $STH = MYSQLDb::select( 'user_id', $table_name, $sql);
                $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array
                $result = $STH->fetch();
                    
                    if( !empty( $result ) ){
                        
                        $result['id'] = $result['user_id'];
                        unset($result['user_id']);
                        $string = 'abcdefghijklmnopqrstuvwxyz'.'0123456789!@#$%^&*()'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $newPassword = mb_substr( str_shuffle($string), 6, 7 );
                        
                        if( $this->updatePassword( $newPassword, $result ) == true ){
                            
                            $this->new_password = $newPassword;
                            return true;
                        }
                        else  { return false;   }
                    }
                    else  { return false;   }

            }
            catch ( PDOException $e ) { echo '<br> cant get user_id  from  _DB: '; echo $e->getMessage(); DIE(); }
        }

        public function updatePassword( $password_str, $id_arr ){

            $hashed_password = array( 'hashed_password' => sha1( sha1( $password_str ) ) );

            try{
                
                if( MYSQLDb::save( $hashed_password, $this->table_name, $id_arr ) != null ){  
                    return true;  
                }
                else{  return false;  }             
            }
            catch ( PDOException $e ) {  echo '<br> cant save secretQuestions to  _DB: '. $e->getMessage(); DIE(); }
        }
        
        
        public function allActiveUsers( $login ){

            $data = array();
            trim( htmlspecialchars( $login ) );
            $sql = "status = 'active' AND role = 'user' AND login <>" . "'$login'";
            
        try{
            $STH = MYSQLDb::select( 'login, id', $this->table_name, $sql );
            $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array
            
            foreach( $STH->fetchAll() as $key => $value){
                
                $data[$key] = $value;
            }
        }
        catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }

        return $data; //return user ID
    }

    
    }


