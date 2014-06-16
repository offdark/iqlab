<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/16/14
 * Time: 6:14 PM
 */




/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/21/14
 * Time: 5:04 PM
 */
define( 'URL', "http://localhost/iqlab/chess/" );
include 'Session.class.php';

    function my_autoloader( $class_name ) {
        include 'includes/' . $class_name . '.class.php';
    }
    spl_autoload_register('my_autoloader');



    function secretQ( $id ){


        $secretQuastions1 = array (
            'What is the middle name of your oldest child?',
            'What was your childhood nickname?',
            'What school did you attend for sixth grade?',
            'What was your childhood phone number including area code?',
            'In what city or town was your first job?'
        );

        $secretQuastions2 = array (
            'In what city or town did your mother and father meet?',
            'Where were you when you had your first kiss?',
            'What is the first name of the boy or girl that you first kissed?',
            'What was the last name of your third grade teacher?',
            'In what city does your nearest sibling live?',
            'What car do you have ?'
        );

        if( $id == 1 ){  return $secretQuastions1;   }elseif( $id == 2 ){    return $secretQuastions2;   }
    }



    function htmlHesh(){
        //TODO  connect to DB and take moves from there


        $figuresHash = array(

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
        return $figuresHash;
    }

  function find(){

      $start_positions = array(

          'rook-w_l'   => 'A1',
          'knight-w_l' => 'B1',
          'bishop-w_l' => 'C1',
          'queen-w_1'  => 'D1',
          'king-w_1'   => 'E1',
          'bishop-w_r' => 'F1',
          'knight-w_r' => 'G1',
          'rook-w_r'   => 'H1',

          'pawn-w_1' => 'A2',
          'pawn-w_2' => 'B2',
          'pawn-w_3' => 'C2',
          'pawn-w_4' => 'D2',
          'pawn-w_5' => 'E2',
          'pawn-w_6' => 'F2',
          'pawn-w_7' => 'G2',
          'pawn-w_8' => 'H2',

          'rook-b_l'   => 'A8',
          'knight-b_l' => 'B8',
          'bishop-b_l' => 'C8',
          'queen-b_1'  => 'D8',
          'king-b_1'   => 'E8',
          'bishop-b_r' => 'F8',
          'knight-b_r' => 'G8',
          'rook-b_r'   => 'H8',

          'pawn-b_1' => 'A7',
          'pawn-b_2' => 'B7',
          'pawn-b_3' => 'C7',
          'pawn-b_4' => 'D7',
          'pawn-b_5' => 'E7',
          'pawn-b_6' => 'F7',
          'pawn-b_7' => 'G7',
          'pawn-b_8' => 'H7'

      );

      return $start_positions;
  }


    function chessboard(){

        $table = null;

        for( $x = 8; $x >= 1; $x-- ){

            $table .= "<tr>";

            for( $number = 1, $letter = 'A'; $number <= 8; $number++, $letter++ ){

                $table .= '<td id="'. $letter.$number .'" >'. putFiguresChessBoard( $letter.$number ) .'</td>';
            }
            $table .= "</tr>";
        }
        return $table;
    }

    function putFiguresChessBoard( $value_str ){

        $result = null;

        foreach( htmlHesh() as $key => $value ){

            if( $value_str == $key ){

                //    $result = "<a href='#' >". $value ."</a>";
            }
        }


        <script type="text/javascript">

        var start_possition = null;
        var end_possition = null;
        var curent_side = 'black';

        var whiteFigures = ['&#9812;',  '&#9813;', '&#9814;', '&#9815;', '&#9816;', '&#9817;'];
        var blackFigures = ['&#9818;',  '&#9819;', '&#9820;', '&#9821;', '&#9822;', '&#9823;'];


        $(function(){
            $('td').click(function(){

                alert( $(this).attr('id') );
                var c_id = $(this).attr('id');
                var c_name = $(this).data('cr_name');
                var c_side = $(this).data('cr_side');

                //define state
                if( from === null ){

                    //check clicked figure

                    // is mine
                    if(c_side != curent_side){
                        return ;
                    }

                    //if empty
                    if(c_name.length == 0){
                        return;
                    }
                    // set start coordinate
                    from = c_id;
                }
                else{
                    // start is defined
                    if( from == c_id ){
                        return;
                    }else if(  ){

                    }
                    // check move
                    to = c_id;


                }
                //do some action
            });
        });


    </script>

        //  print_r(htmlHesh());
        //  DIE();

        return $result;

    }



    function fileName(){

        return basename( $_SERVER['REQUEST_URI'], '?'. $_SERVER['QUERY_STRING'] );
    }

