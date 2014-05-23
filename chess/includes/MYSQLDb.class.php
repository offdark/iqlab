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
                catch (PDOException $e) {echo '<br> Cant connect to _DB: ' . $e->getMessage(); DIE();}
                
            }
            
            return self::$DBH;       
        }
        
        
        public static function close_connection(){
            self::$DBH = null;
        } 
    }



