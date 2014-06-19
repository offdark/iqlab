<?php

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


    function fileName(){

    return basename( $_SERVER['REQUEST_URI'], '?'. $_SERVER['QUERY_STRING'] );
    }

