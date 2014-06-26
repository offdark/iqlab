<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/5/14
 * Time: 6:05 PM
 */

class NewGame  {

    public $table_name = 'game';
    public  $figuresStartPosition = array(
                                            'A1' => '&#9814',
                                            'B1' => '&#9816',
                                            'C1' => '&#9815',
                                            'D1' => '&#9812',
                                            'E1' => '&#9813',
                                            'F1' => '&#9815',
                                            'G1' => '&#9816',
                                            'H1' => '&#9814',

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

    function __construct( $invitationId_int = null ){

        if( $invitationId_int != null ){

            $id = array( 'id' => $invitationId_int );
            
            try{
                $STH = MYSQLDb::select( 'from_user_login, to_user_login', 'game_invitation', $id );
                $STH->setFetchMode( PDO::FETCH_ASSOC ); // FetchMODE Array
                
                foreach( $STH->fetch() as $value){
                    
                    $data[] = $value;
                }
                
                $assoc_data = array( 'author_user_login' => $data[0], 'partner_user_login' => $data[1], 'table_state' => serialize( $this->figuresStartPosition ) );

            //TODO create PDO transaction !!!!

                try{
                    if( MYSQLDb::save( $assoc_data, $this->table_name  ) != null ){

                        $updateStatus = new GameInvitation();

                        if( $updateStatus->update( $invitationId_int ) == true ){

                            return true;
                        }
                        else { return false; }

                    }
                    else{  return false;  }
                }
                catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }
             //   echo "<br>";
             //   print_r($assoc_data);
             //   DIE();

            }
            catch ( PDOException $e ) { echo  $e->getMessage(); DIE(); }


        }

    }



   public function chessboard( $Fpossition, $values_arr = null ){
        // Creating chessboard

        ( !empty($values_arr) ) ? $table = '<table id="chess_board_small" ' : $table =  '<table id="chess_board" ';

       $table .= 'cellpadding="0" cellspacing="0">';

            for( $number = 8; $number >= 1; $number-- ){

                $table .= "<tr>";

                for( $x = 1, $letter = 'A'; $x <= 8; $x++, $letter++ ){

                    $table .= '<td id="'. $letter.$number .'" >'. $this->putFiguresChessBoard( $letter.$number, $Fpossition ) .'</td>';
                }
                $table .= "</tr>";
            }
            
              if ( !empty($values_arr) ){
            //    $table .= "<table>";
                $table .= "<tr class='border_top'>  <td bgcolor='#FFFFFF' colspan='8'> Created: ". $values_arr['created'] ."</td></tr>";
                $table .= "<td bgcolor='#FFFFFF'colspan='8'> Author: ". $values_arr['author_user_login'] ."</td>";
                $table .= "<tr > <td bgcolor='#FFFFFF' colspan='8'>My color: ". $color = ( $values_arr['author_user_login'] != $_SESSION['login'] ) ? 'black' : 'white' ."</td></tr>";
                $table .= "<tr > <td bgcolor='#FFFFFF' colspan='8'>". $nextMove = ( $values_arr['next_go'] == 'whiteFirstMove' && $color != 'black' ) ? " <a href='". URL ."?mod=". htmlspecialchars($values_arr['id']) ."&action=play'> Play</a></td></tr>" : "Waite for a partner first move </td></tr>" ;
             //   echo $values_arr['next_go'];
                  //     $table .= "</table>";
            
             }
             
        return     $table .= '</table>';
    }



   public function putFiguresChessBoard( $value_str, $Fpossition_arr = 'new' ){
        // Putting figures to chessBoard
        
        $htmlFigures = ( $Fpossition_arr == 'new' ) ? $this->figuresStartPosition : $Fpossition_arr;
        $result = null;

        foreach( $htmlFigures as $key => $value ){

            if( $value_str == $key ){
 
                $result = ( $value != '' )? "<a href='#' >". $value. "</a>" : '';
            }
        }
        return $result;
    }



}

