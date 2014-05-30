<?php


/**
 * @author Offdark
 * @copyright 2014
 */

    class MYSQLDb {  // single pattern
        
        private static $DBH = null;
        public $user = 'chess_admin';
        public $pass = '123';


        private function __construct(){ }
        
        private function __clone(){ }
          
        public static function getDBH(){
            //Connecting to DB
            if( !self::$DBH ){
                
                try{
                      self::$DBH = new PDO( 'mysql:host=localhost;dbname=chess', 'chess_admin', '123' );
                      self::$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );          
                }
                catch ( PDOException $e ) { echo '<br> Cant connect to _DB: ' . $e->getMessage(); DIE(); }
            }
            return self::$DBH;       
        }


        public static function insert( $object, $table_name ){
            
            $sql = "INSERT INTO " .$table_name. " SET ";  // generating sql string
                
            $fields = array(); // key -> value in sql string
            $data = array(); // creating data to placeholder 
                
                foreach( $object as $key => $value ){
                    
                    $fields[] = $key." = ?";
                    $data[]   = $value;
                }            
                $sql .= implode(', ',$fields); // comma_separated

            try{                     
                    self::getDBH()->beginTransaction();
                    $STH = self::getDBH()->prepare( $sql );
                    $STH->execute( $data );
                    $lastInsertId = self::getDBH()->lastInsertId();
                    self::getDBH()->commit();
                    
                return $lastInsertId;
            }
            catch ( PDOException $e ){  self::getDBH()->rollBack(); return $e->getMessage(); DIE();  }
        }
        
        public static function update( $object, $table_name, $where_str ){

            $sql = "UPDATE " .$table_name. " SET ";  // generating sql string

            $fields = array(); // key -> value in sql string
            $data = array(); // creating data to placeholder

            foreach( $object as $key => $value ){

                $fields[] = $key." = ?";
                $data[]   = $value;
            }
            $sql .= implode(', ',$fields); // comma_separated

            if( !empty($where_str) ){

                $sql .= " WHERE " .$where_str;
            }

            try{
                    self::getDBH()->beginTransaction();
                    $STH = self::getDBH()->prepare( $sql );
                    $STH->execute( $data );
                    $lastInsertId = self::getDBH()->lastInsertId();
                    self::getDBH()->commit();

                return $lastInsertId;
            }
            catch ( PDOException $e ){  self::getDBH()->rollBack(); return $e->getMessage(); DIE();  }
        }


        public static function save( $object, $table_name, $where = '' ){

            if( !empty($where) ){
                return self::update( $object, $table_name, $where );
            }
            return self::insert( $object, $table_name );
        }
        

        public static function select( $mixed, $table_name, $value_mixed = '' ){
            
            $data = array();
            $sql  = "SELECT ";  // generating sql string  
            $sql .= is_array( $mixed )? implode(', ',$mixed) : $mixed;              
            $sql .= " FROM " .$table_name;

            if( !empty($value_mixed) && is_array($value_mixed) ){

                $fields = array(); // key -> value in sql string
                $data = array(); // creating data to placeholder

                foreach( $value_mixed as $key => $value ){
    
                    $fields[] = $key." = ?";
                    $data[]   = $value;
                }
                $sql .= " WHERE ". implode(', ',$fields); // comma_separated;
            }
            else{  $sql .= " WHERE ". $value_mixed;  }

                 echo $sql;
                print_r($data);
                DIE();
            try{
                
                $STH = self::getDBH()->prepare( $sql );
                $STH->execute( $data );
                $STH->setFetchMode( PDO::FETCH_OBJ ); // FetchMODE Object
                return $STH; // return OBJECT              
            }
            catch ( PDOException $e ){  return $e->getMessage(); DIE();  }
        }


        public static function close_connection(){
            self::$DBH = null;
        } 
    }



