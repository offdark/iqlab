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
        $data = array();

        try{
            
            $STH = $this->DB_allSelect( '*', $id );

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
    
    /**
     * ActiveGame::nextMove()
     * 
     * @return
     */
    public function nextMove(){
        
        
        
    }
    

    public function save( $game_arr = null ){
        
        $game_arr = array(
                                            'A1' => '&#9814',
                                            'B1' => '&#9816',
                                            'C1' => '&#9815',
                                            'D1' => '&#9812',
                                            'E1' => '&#9813',
                                            'F1' => '&#9815',
                                            'G1' => '&#9816',
                                            'H1' => '',

                                            'A2' => '&#9817;',
                                            'B2' => '&#9817;',
                                            'C2' => '&#9817;',
                                            'D2' => '&#9817;',
                                            'E2' => '&#9817;',
                                            'F2' => '&#9817;',
                                            'G2' => '&#9817;',
                                            'H2' => '&#9817;',

                                            'A8' => '&#9820;',
                                            'B8' => '&#9822;',
                                            'C8' => '&#9821;',
                                            'D8' => '&#9818;',
                                            'E8' => '&#9819;',
                                            'F8' => '&#9821;',
                                            'G8' => '&#9822;',
                                            'H8' => '&#9820;',

                                            'A7' => '&#9823;',
                                            'B7' => '&#9823;',
                                            'C7' => '&#9823;',
                                            'D7' => '&#9823;',
                                            'E7' => '&#9823;',
                                            'F7' => '&#9823;',
                                            'G7' => '&#9823;',
                                            'H7' => '&#9823;'
                                         );
        
        
        echo "beffore replaysment: ";
        print_r($this->figuresPosition);
        echo count($this->figuresPosition);
        echo "<br> after: ";
        $this->figuresPosition = array_replace( $this->figuresPosition, $game_arr );
        print_r($this->figuresPosition);
           echo count($this->figuresPosition);
        
        try{
                
                
           }
            catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }  
    }
        
}