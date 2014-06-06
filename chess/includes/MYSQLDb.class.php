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

        //    echo $sql;
         //   print_r($data);
          //  DIE();

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
        
        public static function update( $object, $table_name, $where_mixed ){

            $sql = "UPDATE " .$table_name. " SET ";  // generating sql string
            $data = array(); // creating data to placeholder

            if( !empty($object) && is_array($object) ){

                $fields = array(); // key -> value in sql string

                foreach( $object as $key => $value ){

                    $fields[] = $key." = ?";
                    $data[]   = $value;
                }
                $sql .= implode(', ',$fields); // comma_separated
            }
            else{  $sql .= $object;  }

            
            if( is_array($where_mixed) ){

                $fields = array(); // key -> value in sql string

                foreach( $where_mixed as $key => $value ){
    
                    $fields[] = $key." = ?";
                    $data[]   = $value;
                }
                $sql .= " WHERE ". implode(', ',$fields); // comma_separated;           
            }
            else{   !empty($where_mixed) ? $sql .= " WHERE ". $where_mixed : $sql .= '' ; }


      //      print_r($data);
       //     echo $sql;
        //    DIE();
            try{
                    self::getDBH()->beginTransaction();
                    $STH = self::getDBH()->prepare( $sql );
                    ( !empty($data) ) ? $STH->execute( $data ) : $STH->execute();   
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
            
            $data = array(); // creating data to placeholder
            $sql  = "SELECT ";  // generating sql string  
            $sql .= is_array( $mixed )? implode(', ',$mixed) : $mixed;              
            $sql .= " FROM " .$table_name;

             if( is_array($value_mixed) ){

                $fields = array(); // key -> value in sql string

                foreach( $value_mixed as $key => $value ){
    
                    $fields[] = $key." = ?";
                    $data[]   = $value;
                }
                $sql .= " WHERE ". implode(', ',$fields); // comma_separated;           
            }
            else { !empty($value_mixed) ? $sql .= " WHERE ". $value_mixed : $sql .= '' ; }


           //     echo $sql;
        //        print_r($data);
         //       DIE();
            try{
                
                $STH = self::getDBH()->prepare( $sql );
                ( !empty($data) ) ? $STH->execute( $data ) : $STH->execute();   
                
                return $STH;                    
            }
            catch ( PDOException $e ){  echo $e->getMessage(); DIE();  }
        }


        public static function close_connection(){
            self::$DBH = null;
        } 
    }



