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


    public function send( $from_user_str, $to_user_str ){

        $sql_arr = array(
                           'text'            => $this->text,
                           'from_user_login'    => $from_user_str,
                           'to_user_login'      => $to_user_str,
                        );

        try{
            if( MYSQLDb::save( $sql_arr, $this->table_name  ) != null ){
              return true;
            }
            else{   return false;  }
        }
        catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }
    }


    public function listing( $to_user_str ){
        
        $data = array();
        trim( htmlspecialchars( $to_user_str ) );
        $sql = "to_user_login = '$to_user_str' AND status = 'progress' "; // generating query
        
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


    public function cancel( $id_int ){

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

    public function outcome( $login_str ){

        $data = array();
        $sql_arr = array( 'from_user_login' => $login_str );

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

    public function update( $invitationId_int ){

        $sql_arr = array( 'status' => 'accepted');
        $id_arr = array( 'id' => $invitationId_int );

        try{
            if( MYSQLDb::save( $sql_arr, $this->table_name, $id_arr ) != null ){
                return true;
            }
            else{  return false;  }
        }
        catch ( PDOException $e ) {  echo '<br> cant save secretQuestions to  _DB: '. $e->getMessage(); DIE(); }

    }



}

