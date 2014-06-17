<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/5/14
 * Time: 6:05 PM
 */

class GameInvitation {

    public $text = 'join me in a battle';
    public $game_id = 1;
    public $result = 'false';
    public $table_name = 'game_invitation';
    public $data = array();


    public function sendInvitation( $from_user_id_int, $to_user_id_int ){

        $sql_arr = array(
                           'text' => $this->text,
                           'from_user_id' => $from_user_id_int,
                           'to_user_id' => $to_user_id_int,
                           'game_id' => $this->game_id,
                           'result' => $this->result
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

        $sql_arr = array( 'to_user_id' => $to_user_id_int );

        try{
           if( $STH = MYSQLDb::select( 'text, from_user_id', $this->table_name, $sql_arr ) != null ){

               $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array

               foreach( $STH->fetchAll() as $key => $value){

                   $this->data[$key] = $value;
               }

               return $this->data; //return user ID

           }
           else {  return false; }

        }
        catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }
    }
}

