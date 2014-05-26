<?php


/**
 * @author Offdark
 * @copyright 2014
 */
    include 'Config.class.php';

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


        public static function insert( $table_name, $object ){
            
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
                    self::getDBH()->commit();                                                         
            }
            catch ( PDOException $e ){  self::getDBH()->rollBack(); echo var_dump($object).'<br> cant insert values to  _DB: '. $e->getMessage(); DIE();  }                     
        }
        
        public static function select( $row, $table_name, $object ){
            
            $sql = "SELECT" .$row. " FROM " .$table_name. " WHERE ";  // generating sql string
                
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
                    self::getDBH()->commit();                                                         
            }
            catch ( PDOException $e ){  self::getDBH()->rollBack(); echo var_dump($object).'<br> cant insert values to  _DB: '. $e->getMessage(); DIE();  }                     
        
            
        }
        

        public static function close_connection(){
            self::$DBH = null;
        } 
    }



