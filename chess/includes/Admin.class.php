<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/5/14
 * Time: 6:05 PM
 */

class Admin extends User {

    public $data = array();

    public function allUsers(){

        try{
            $STH = MYSQLDb::select( '*', $this->table_name );
            $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array

            foreach( $STH->fetchAll() as $key => $value){

                $this->data[$key] = $value;
            }
        }
        catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }

        return $this->data; //return user ID
    }

    public function getUserById( $id_int ){
        $sql = array( 'id' => $id_int );
        try{
            $STH = MYSQLDb::select( '*', $this->table_name, $sql );
            $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array

            foreach( $STH->fetch() as $key => $value){

                $this->data[$key] = $value;
            }
        }
        catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }

        return $this->data; //return user ID
    }


    public function updateUser( $id_int, $POST_arr ){

        unset($POST_arr['submit']);

        $fields = array(); // key -> value in sql string
        $data = array();

        foreach( $POST_arr as $key => $value ){

            $fields[] = "(". $key ." = '". $value ."')";
        }
        $sql = implode(' AND ',$fields);


        $sql = "id = ".$id_int;
        $set = array( 'status' => 'active' );

        try{
            if( MYSQLDb::save( $p, $this->table_name, $id_arr ) != null ){
                return true;
            }
            else{  return false;  }
        }
        catch ( PDOException $e ) {  echo '<br> cant updateUser: '. $e->getMessage(); DIE(); }
    }
}

