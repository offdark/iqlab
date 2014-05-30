<?php

/**
 * @author Offdark
 * @copyright 2014
 */

include 'includes/functions.php';

    $page = $_SERVER['QUERY_STRING'];
    
    if( empty($_SESSION['id']) || empty($_SESSION['fileName']) ){
       header( 'Location: ../recPass_email.php' );
    }
     
    $id = $_SESSION['id'];
    $fileName = $_SESSION['fileName'];
    
    if( isset( $_POST['submit'] ) ){ // START Cheking if Button was Sabmit

         unset ($_POST['submit']);
         
          $query = MYSQLDb::select( $string, 'password_reset', $value );
              
              foreach( $query->fetch() as $key => $value){
                
                echo $key;
                echo "<br>";
                echo $value;
              }

         $parse_id = $_SERVER['QUERY_STRING'];
         parse_str($parse_id);

         $_POST['user_id'] = $id;

        $user = new User();
        $user->table_name = 'password_reset';
        

        $user->saveQuestions( $_POST );

        header( 'Location: ../login.php' );

    }
    else // END Cheking if Button was Sabmit

    include 'html/header.inc';
?>


<form action="generate_secretQ.php?<?php echo htmlspecialchars($id); ?>" method="POST" class="form">
    <fieldset>
        
        <label>Security question 1: 
        <select name="secretQ1" size="1">
        <?php $secretQuastions1 = secretQ( $id = 1 );
                foreach( $secretQuastions1 as $value ){       
                    echo '<option value="' .htmlspecialchars($value). '" >' .$value. '</option>';   
                } ?>
        </select>
        </label>
        
        <label>answer  <span class="mark-red">*</span>
        <span class="input"><input id="secretQA1"  type="text" name="secretQA1" value="" placeholder="" /></span>
        </label><br />
        
        <label>Security question 2:  
        <select name="secretQ2" size="1">
        <?php  $secretQuastions2 = secretQ( $id = 2 );
                foreach( $secretQuastions2 as $value ){       
                    echo '<option value="' .htmlspecialchars($value). '" >' .$value. '</option>';   
                } ?>
        </select>
        </label>
        
        <label>answer  <span class="mark-red">*</span>
        <span class="input"><input id="secretQA2" type="text" name="secretQA2" value="" placeholder="" /></span>
        </label>
        
        <input type="submit" name="submit" class="btn-form" value="Submit" />

    </fieldset>
</form>
