<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/5/14
 * Time: 6:05 PM
 */

class GameInvitation {

    public $text = 'join me in a battle';
    public $table_name = 'game_invitation';


    public function sendInvitation( $from_user_id_int, $to_user_id_int, $from_user_login ){

        $sql_arr = array(
                           'text'            => $this->text,
                           'from_user_id'    => $from_user_id_int,
                           'to_user_id'      => $to_user_id_int,
                           'from_user_login' => $from_user_login,
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
        settype( $to_user_id_int, "integer" );
        $sql = "to_user_id = '$to_user_id_int' AND status = 'progress' "; // generating query
        
        try{
            $STH = MYSQLDb::select( '*', $this->table_name, $sql );
            $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array
            
            foreach( $STH->fetchAll() as $key => $value){
                
                $data[$key] = $value;
            }
            
            print_r($data);

        }
        catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }
        
        return $data; //return user ID
    }


    public function invitationCancel( $id_int ){

        $data = array();
        settype( $id_int, "integer" );
        $sql_arr = array( 'status' => 'canceled');
        $id_arr = array( 'id' => $id_int );

        try{
            if( MYSQLDb::save( $sql_arr, $this->table_name, $id_arr ) != null ){
                return true;
            }
            else{  return false;  }
        }
        catch ( PDOException $e ) {  echo '<br> cant save secretQuestions to  _DB: '. $e->getMessage(); DIE(); }
    }

    public function outcomeInvitations( $id ){

        $data = array();
        settype( $id, "integer" );
        $sql_arr = array( 'from_user_id' => $id );

        try{
            $STH = MYSQLDb::select( '*', $this->table_name, $sql_arr );
            $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array

            foreach( $STH->fetchAll() as $key => $value){

                $data[$key] = $value;
            }
        }
        catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }

        return $data; //return user ID
    }



}

