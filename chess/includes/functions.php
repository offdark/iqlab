<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/21/14
 * Time: 5:04 PM
 */

include 'Session.class.php';

    function my_autoloader( $class_name ) {
        include 'includes/' . $class_name . '.class.php';
    }  
    spl_autoload_register('my_autoloader');

define( 'URL', "http://localhost/test/chess/" );

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
                                    'What is your oldest brother�s birthday month and year? (e.g., January 1900)' 
                                  );
                                  
        if( $id == 1 ){  return $secretQuastions1;   }elseif( $id == 2 ){    return $secretQuastions2;   }
    }