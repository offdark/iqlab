<?php 


    class ActiveGame extends NewGame {
        
        public  $figuresPosition = array();
        
         
       function __construct(  ){
       }
    
    
    public function selectAll( $author_user_login_str ){
            
            $sql = "author_user_login = '". $author_user_login_str ."' OR partner_user_login = '". $author_user_login_str ."'";
        
        try{
                $STH = MYSQLDb::select( '*', $this->table_name, $sql );
                $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array
                
                foreach( $STH->fetchAll() as $keys => $values){
                     
                    foreach( $values as $value ){
                                          
                        $this->figuresPosition = unserialize( $values['table_state'] ); 
                    }
                    
                    echo  $this->chessboard( $this->figuresPosition, $values ); 
                }
            }
            catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }       
    }


    public function select( $gameId_int ){

        $id = array( 'id' => $gameId_int );
        $data = array();

        try{
            $STH = MYSQLDb::select( '*', $this->table_name, $id );
            $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array

            foreach( $STH->fetch() as $key => $value){

                if( $key == 'table_state' ){

                    $this->figuresPosition = unserialize( $value );
                }
                else{  $data[$key] = $value;  }
            }

           echo  $this->chessboard( $this->figuresPosition );
       //         echo "<br><br>";
        //   print_r($data);
            return $data;
        }
        catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }
    }

    
    public function nextMove(){
        
        
        
    }
        
}