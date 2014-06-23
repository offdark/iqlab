<?php 


    class ActiveGame extends NewGame {
        
        public  $figuresPosition = array();
        
         
         function __construct( $invitationId_int = null ){
        
        if( $invitationId_int != null ){

            $id = array( 'id' => $invitationId_int );
            
            try{
                $STH = MYSQLDb::select( 'from_user_login, to_user_login', 'game_invitation', $id );
                $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array
                
                foreach( $STH->fetch() as $value){
                    
                    $data[] = $value;
                  
                }
                $chessFigures = serialize( $this->figuresStartPosition );
                
                $assoc_data = array( 'author_user_login' => $data[0], 'partner_user_login' => $data[1], 'table_state' => $chessFigures );
                $this->create( $assoc_data );
             //   print_r($assoc_data);
                DIE();
    
            }
            catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }

        }
        
    }
    
    
    public function selectAll( $author_user_login_str ){
            
           
            $sql = "author_user_login = '". $author_user_login_str ."' OR partner_user_login = '". $author_user_login_str ."'";
           // echo $sql;
          //  DIE();
        
        try{
                $STH = MYSQLDb::select( '*', $this->table_name, $sql );
                $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array
              //  print_r($STH->fetchAll());
                
                foreach( $STH->fetchAll() as $keys => $values){
                     
                   
                    
                 //   $data[$key] = $value;
                    foreach( $values as $value ){
                        
                         
                    $this->figuresPosition = unserialize( $values['table_state'] );
                    
                  return  $this->chessboard( $this->figuresPosition, true );
                       
                    }
                 
            
                }
      
              //  $chessFigures = serialize( $this->figuresStartPosition );
              //  unserialize();                
                
             //   $assoc_data = array( 'author_user_login' => $data[0], 'partner_user_login' => $data[1], 'table_state' => $chessFigures );
             //   $this->create( $assoc_data );
             //   print_r($data);
             //   echo"<br>";
             //   print_r($this->figuresPosition);
             //   DIE();
    
            }
            catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }
        
    }
        
        
    }