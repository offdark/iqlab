<div class="container-content">

<form action="secretQ.php" method="POST" class="form">
      <fieldset>
       <?php if( isset($_SESSION['error'])){  echo '<span class="mark-red"> Your question or answer didnt match!!! Please try again </span>'; unset($_SESSION['error']);  } ?>
       <br /><br />
        <label>Security question 1: 
        <select name="secretQ1" size="1">
        <?php $secretQuestions1 = secretQ( $id = 1 );
                foreach( $secretQuestions1 as $value ){       
                    echo '<option value="' .htmlspecialchars($value). '" >' .$value. '</option>';   
                } ?>
        </select>
        </label>
        
        <label>answer  <span class="mark-red">*</span>
        <span class="input"><input id="secretQA1"  type="text" name="secretQA1" required /></span>
        </label><br />
         
        <label>Security question 2:  
        <select name="secretQ2" size="1">
        <?php  $secretQuestions2 = secretQ( $id = 2 );
                foreach( $secretQuestions2 as $value ){       
                    echo '<option value="' .htmlspecialchars($value). '" >' .$value. '</option>';   
                } ?>
        </select>
        </label>
        
        <label>answer  <span class="mark-red">*</span>
        <span class="input"><input id="secretQA2" type="text" name="secretQA2" required /></span>
        </label>
        
        <input type="submit" name="submit" class="btn-form" value="Submit" />

    </fieldset>
</form>

</div>