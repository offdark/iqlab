<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/5/14
 * Time: 6:05 PM
 */

class Admin extends User {

    public $data = array();

    public function allUsers(  ){

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

}

