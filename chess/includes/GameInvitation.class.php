<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/5/14
 * Time: 6:05 PM
 */

class GameInvitation {

    public $text = 'join me in a battle';
    public $result = 'false';
    public $table_name = 'game_invitation';


    public function sendInvitation( $from_user_id_int, $to_user_id_int, $from_user_login ){

        $sql_arr = array(
                           'text'         => $this->text,
                           'from_user_id' => $from_user_id_int,
                           'to_user_id'   => $to_user_id_int,
                           'from_user_login' => $from_user_login,
                           'result'       => $this->result
                        );

        try{
            if( MYSQLDb::save( $sql_arr, $this->table_name  ) != null ){
              return true;
            }
            else{   return false;  }
        }
        catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }
    }


    public function invitationList( $to_user_id_int ){
        
        $data = array();
        // $sql = "status = 'active' AND role = 'user' AND id <>" . "'$id'";   
        settype( $to_user_id_int, "integer" );
        $sql_arr = array( 'to_user_id' => $to_user_id_int );
        
        try{
            $STH = MYSQLDb::select( '*', $this->table_name, $sql_arr );
            $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array
            
            foreach( $STH->fetchAll() as $key => $value){
                
                $data[$key] = $value;
            }
            
            print_r($data);

        }
        catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }
        
        return $data; //return user ID
    }
}

