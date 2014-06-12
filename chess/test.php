<?php include'/includes/functions.php'; ?>
<style>

a {
    color: #00BEC5;
	display:block;
	font-size:60px;
	height:80px;
	position:relative;
	text-decoration:none;
	text-shadow:0 1px #fff;
	width:80px;
}

a:hover {
    
    color: red;
}
#chess_board { border:5px solid #333; }
#chess_board td {
	background:#fff;
	background:-moz-linear-gradient(top, #fff, #eee);
	background:-webkit-gradient(linear,0 0, 0 100%, from(#fff), to(#eee));
	box-shadow:inset 0 0 0 1px #fff;
	-moz-box-shadow:inset 0 0 0 1px #fff;
	-webkit-box-shadow:inset 0 0 0 1px #fff;
	height:80px;
	text-align:center;
	vertical-align:middle;
	width:80px;
}
#chess_board tr:nth-child(odd) td:nth-child(even),
#chess_board tr:nth-child(even) td:nth-child(odd) {
	background:#ccc;
	background:-moz-linear-gradient(top, #ccc, #eee);
	background:-webkit-gradient(linear,0 0, 0 100%, from(#ccc), to(#eee));
	box-shadow:inset 0 0 10px rgba(0,0,0,.4);
	-moz-box-shadow:inset 0 0 10px rgba(0,0,0,.4);
	-webkit-box-shadow:inset 0 0 10px rgba(0,0,0,.4);
}
</style>

<?php 

  $figures_black = array (
            
            "rook_l_b"   => '&#9820;',
            "night_l_b"  => '&#9822;',
            "bishop_r_b" => '&#9821;',
            "king_b"     => '&#9819;',
            "queen_b"    => '&#9818;',
            "bishop_l_b" => '&#9821;',
            "night_r_b"  => '&#9822;',
            "rook_r_b"   => '&#9820;',
            "pawn_b"     => '&#9823;',
            "pawn_b1"    => '&#9823;',
            "pawn_b2"    => '&#9823;',
            "pawn_b3"    => '&#9823;',
            "pawn_b4"    => '&#9823;',
            "pawn_b5"    => '&#9823;',
            "pawn_b6"    => '&#9823;',
            "pawn_b7"    => '&#9823;',
            "pawn_b8"    => '&#9823;'
                    );


   $figures_white = array (
            
            "rook_l_w"   => '&#9814;',
            "night_l_w"  => '&#9816;',
            "bishop_r_w" => '&#9815;',
            "king_w"     => '&#9813;',
            "queen_w"    => '&#9812;',
            "bishop_l_w" => '&#9815;',
            "night_r_w"  => '&#9816;',
            "rook_r_w"   => '&#9814;',
            "pawn_w1"    => '&#9817;',
            "pawn_w2"    => '&#9817;',
            "pawn_w3"    => '&#9817;',
            "pawn_w4"    => '&#9817;',
            "pawn_w5"    => '&#9817;',
            "pawn_w6"    => '&#9817;',
            "pawn_w7"    => '&#9817;',
            "pawn_w8"    => '&#9817;'

                    );
?>

<script type="text/javascript">

    var myFuncCalls = 0;
 
    function getId(d){
        
           alert(d.getAttribute("id"));
           var toBeMovedId = (d.getAttribute("id"));   
           myFuncCalls++;       
    }
    
    
    
</script>


<table id="chess_board" cellpadding="0" cellspacing="0">
	<tr>
		<td id="A8" onclick="getId(this);"><a href="#"   class="rook black" >&#9820;</a></td>
		<td id="B8" onclick="getId(this);"><a href="#" class="night black" >&#9822;</a></td>
		<td id="C8" onclick="getId(this);"><a href="#" class="bishop black">&#9821;</a></td>
		<td id="D8" onclick="getId(this);"><a href="#" class="king black">&#9819;</a></td>
		<td id="E8" onclick="getId(this);"><a href="#" class="queen black">&#9818;</a></td>
		<td id="F8" onclick="getId(this);"><a href="#" class="bishop black">&#9821;</a></td>
		<td id="G8" onclick="getId(this);"><a href="#" class="night black">&#9822;</a></td>
		<td id="H8" onclick="getId(this);"><a href="#" class="rook black">&#9820;</a></td>       	
	</tr>
	<tr>
		<td id="A7" onclick="getId(this);"><a href="#" class="pawn black">&#9823;</a></td>
		<td id="B7" onclick="getId(this);"><a href="#" class="pawn black">&#9823;</a></td>
		<td id="C7" onclick="getId(this);"><a href="#" class="pawn black">&#9823;</a></td>
		<td id="D7" onclick="getId(this);"><a href="#" class="pawn black">&#9823;</a></td>
		<td id="E7" onclick="getId(this);"><a href="#" class="pawn black">&#9823;</a></td>
		<td id="F7" onclick="getId(this);"><a href="#" class="pawn black">&#9823;</a></td>
		<td id="G7" onclick="getId(this);"><a href="#" class="pawn black">&#9823;</a></td>
		<td id="H7" onclick="getId(this);"><a href="#" class="pawn black">&#9823;</a></td>
	</tr>
	<tr>
		<td id="A6" onclick="getId(this);"></td>
		<td id="B6" onclick="getId(this);"></td>
		<td id="C6" onclick="getId(this);"></td>
		<td id="D6" onclick="getId(this);"></td>
		<td id="E6" onclick="getId(this);"></td>
		<td id="F6" onclick="getId(this);"></td>
		<td id="G6" onclick="getId(this);"></td>
		<td id="H6" onclick="getId(this);"></td>
	</tr>
	<tr>
		<td id="A5" onclick="getId(this);"></td>
		<td id="B5" onclick="getId(this);"></td>
		<td id="C5" onclick="getId(this);"></td>
		<td id="D5" onclick="getId(this);"></td>
		<td id="E5" onclick="getId(this);"></td>
		<td id="F5" onclick="getId(this);"></td>
		<td id="G5" onclick="getId(this);"></td>
		<td id="H5" onclick="getId(this);"></td>
	</tr>
	<tr>
	    <td id="A4" onclick="getId(this);"></td>
		<td id="B4" onclick="getId(this);"></td>
		<td id="C4" onclick="getId(this);"></td>
		<td id="D4" onclick="getId(this);"></td>
		<td id="E4" onclick="getId(this);"></td>
		<td id="F4" onclick="getId(this);"></td>
		<td id="G4" onclick="getId(this);"></td>
		<td id="H4" onclick="getId(this);"></td>
	</tr>
	<tr>
	    <td id="A3" onclick="getId(this);"></td>
		<td id="B3" onclick="getId(this);"></td>
		<td id="C3" onclick="getId(this);"></td>
		<td id="D3" onclick="getId(this);"></td>
		<td id="E3" onclick="getId(this);"></td>
		<td id="F3" onclick="getId(this);"></td>
		<td id="G3" onclick="getId(this);"></td>
		<td id="H3" onclick="getId(this);"></td>
	</tr>
	<tr>
		<td id="A2" onclick="getId(this);"><a href="#" class="pawn white">&#9817;</a></td>
		<td id="B2" onclick="getId(this);"><a href="#" class="pawn white">&#9817;</a></td>
		<td id="C2" onclick="getId(this);"><a href="#" class="pawn white">&#9817;</a></td>
		<td id="D2" onclick="getId(this);"><a href="#" class="pawn white">&#9817;</a></td>
		<td id="E2" onclick="getId(this);"><a href="#" class="pawn white">&#9817;</a></td>
		<td id="F2" onclick="getId(this);"><a href="#" class="pawn white">&#9817;</a></td>
		<td id="G2" onclick="getId(this);"><a href="#" class="pawn white">&#9817;</a></td>
		<td id="H2" onclick="getId(this);"><a href="#" class="pawn white">&#9817;</a></td>
	</tr>
	<tr>
		<td id="A1" onclick="getId(this);"><a href="#" class="rook white">&#9814;</a></td>
		<td id="B1" onclick="getId(this);"><a href="#" class="night white">&#9816;</a></td>
		<td id="C1" onclick="getId(this);"><a href="#" class="bishop white">&#9815;</a></td>
		<td id="D1" onclick="getId(this);"><a href="#" class="king white">&#9813;</a></td>
		<td id="E1" onclick="getId(this);"><a href="#" class="wife white">&#9812;</a></td>
		<td id="F1" onclick="getId(this);"><a href="#" class="bishop white">&#9815;</a></td>
		<td id="G1" onclick="getId(this);"><a href="#" class="night white">&#9816;</a></td>
		<td id="H1" onclick="getId(this);"><a href="#" class="rook white">&#9814;</a></td>
	</tr>
</table>



<form action="" method="POST" class="form">
      <fieldset>
      
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

