<?php
$user = 'mike';


$user_images = 'user_images';
$u = $user_images.'/u0';
$id_user = $u.'/'.$user;

function create_folders(){



}

if ( is_dir($user_images) ) { //checking if folder exist

    echo "The file $user_images exists";

    if( is_dir($u) ){ // U0 folder

        echo "folder UO exists";

        if( is_dir($id_user) ){ // ID_USER folder

            echo $id_user;

            //todo algoritm

        }
        else{
            mkdir($id_user);
        }
    }
    else{
       mkdir($u);
    }

} else {
    mkdir($user_images);
}


?>
<!DOCTYPE html>
<html>
<head>


</head>

<body>

<form method="POST" action="index.php">

    Add to the end of list: <input name="text"  type="text" required>
    <input type="submit"  name="add" value="Add" />
    <input name="reset"  type="reset" value="Clear"/>

</form>
<br />
Add element after any position listed:
<form method="POST" action="index.php">

    ID: <input name="looking_id"  type="text" required>     Text: <input name="text"  type="text" required>
    <input type="submit"  name="add_position" value="Add" />
    <input name="reset"  type="reset" value="Clear"/>

</form>
<br />

<table  border="0" width="600" > <!-- START of Second table -->

    <tr bgcolor="#9acd32">

        <th>ID</th>
        <th>Text</th>
        <th colspan="2">Edit</th>

    </tr>



            <form method="POST" action="index.php">

                <tr>

                    <td  align="center"></td>
                    <td  align="center"> </td>
                    <td  align="center">
                        <input type="submit"  name="edit" value="Edit" />
                    </td>
                    <td  align="center">
                        <input type="submit"  name="delete" value="Delete" onclick="return deleletconfig()" />
                        <input type="hidden" name="id" value="" />
                    </td>

                </tr>

            </form>


</table> <!-- END of Second table -->
</body>
</html>