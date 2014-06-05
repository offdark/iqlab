<div class="container-content">

<form action="secretQ.php" method="POST" class="form">
      <fieldset>
       <?php if( isset($_SESSION['error'])): ?> <span class="mark-red"> Your question or answer didnt match!!! Please try again </span><?php unset($_SESSION['error']); endif; ?>
       <br /><br />
        <label>Security question 1: 
        <select name="secretQ1" size="1">
        <?php $secretQuestions1 = secretQ( $id = 1 );
                foreach( $secretQuestions1 as $value ): ?>       
                    <option value="<?php echo htmlspecialchars($value); ?>" > <?php echo $value; ?></option>   
                <?php endforeach; ?>
        </select>
        </label>
        
        <label>answer  <span class="mark-red">*</span>
        <span class="input"><input id="secretQA1"  type="text" name="secretQA1" required /></span>
        </label><br />
         
        <label>Security question 2:  
        <select name="secretQ2" size="1">
               <?php $secretQuestions2 = secretQ( $id = 2 );
                foreach( $secretQuestions2 as $value ): ?>       
                    <option value="<?php echo htmlspecialchars($value); ?>" > <?php echo $value; ?></option>   
                <?php endforeach; ?>
        </select>
        </label>
        
        <label>answer  <span class="mark-red">*</span>
        <span class="input"><input id="secretQA2" type="text" name="secretQA2" required /></span>
        </label>
        
        <input type="submit" name="submit" class="btn-form" value="Submit" />

    </fieldset>
</form>

</div>