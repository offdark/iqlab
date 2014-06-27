<?php 

    /**
     * ActiveGame
     * 
     * @package   
     * @author chess
     * @copyright Offdark
     * @version 2014
     * @access public
     */
     
     
     //TO DO merge methods with one select method
     
    class ActiveGame extends NewGame {
        
        public  $figuresPosition = array();
        public  $data = array();
        
         
       /**
        * ActiveGame::__construct()
        * 
        * @return
        */
       function __construct(  ){

       }
    
    
    public function DB_allSelect( $select_mix, $where_mix ){
                    
        try{
                $STH = MYSQLDb::select( $select_mix, $this->table_name, $where_mix );
                $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array
                return $STH;
            }
            catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }         
    }
    
    /**
     * ActiveGame::selectAll()
     * 
     * @param mixed $author_user_login_str
     * @return
     */
    public function selectAll( $author_user_login_str ){
            
            $sql = "author_user_login = '". $author_user_login_str ."' OR partner_user_login = '". $author_user_login_str ."'";
        
        try{
                $STH = $this->DB_allSelect( '*', $sql );
                
                foreach( $STH->fetchAll() as $keys => $values){
                     
                    foreach( $values as $value ){
                                          
                        $this->figuresPosition = unserialize( $values['table_state'] ); 
                    }
                    
                    echo  $this->chessboard( $this->figuresPosition, $values ); 
                }
            }
            catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }       
    }

    /**
     * ActiveGame::select()
     * 
     * @param mixed $gameId_int
     * @return
     */
    public function select( $gameId_int ){

        $id = array( 'id' => $gameId_int );

        try{
            
            $STH = $this->DB_allSelect( '*', $id );

            foreach( $STH->fetch() as $key => $value){

                if( $key == 'table_state' ){

                    $this->figuresPosition = unserialize( $value );
                }
                else{  $this->data[$key] = $value;  }
            }

           echo  $this->chessboard( $this->figuresPosition );
       //         echo "<br><br>";
        //   print_r($data);
            $_SESSION['myColor'] = $this->getUserColor($this->data['author_user_login']);

            return $this->data;
        }
        catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }
    }


    public function moveFigure( $newPosition_arr, $oldPosition = null ){

        $this->figuresPosition = array_replace( $this->figuresPosition, $newPosition_arr );

        if( !empty( $oldPosition ) ){  unset( $this->figuresPosition[$oldPosition] );  }

        $next_go = ( $this->data['next_go'] == 'whiteFirstMove' || $this->data['next_go'] == 'white' ) ? 'black' : 'white';

        $gameId = array( 'id' => $this->data['id'] );

        $assoc_data = array(
                            'edited'       => date('Y-m-d H:i:s'),
                            'next_go'      => $next_go,
                            'table_state'  => serialize( $this->figuresPosition )
                            );

        try{
             if( MYSQLDb::save( $assoc_data, $this->table_name, $gameId  ) != 0 ){ /* $this->select($this->data['id']); */return true; } else{
                 //TODO <javascript> response
                 return false; }
           }
            catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }  
    }




}