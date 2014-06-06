<div class="container-content">
    <div class="white-block">
        <div class="content-heading">

            <h1> Edit user </h1>

            <table border="0" width="100%" > <!-- START of TABLE -->

                <tr bgcolor="#C9D3DC">

                    <?php   foreach( $user  as $key => $values  ): ?>
                        <th><?php echo $key; ?> </th>

                    <?php   endforeach;    ?>

                    <th colspan="2">Edit</th>
                </tr>
                <form method="POST" action="index.php">


                    <tr>

                    <?php foreach( $user as $value  ): ?>

                            <td align="center"> <input name="<?php echo $key; ?>" class="inputUser" type="text" required <?php if( $user != 'id' ){ echo 'value="'. $value .'">';} ?> </td>


                    <?php   endforeach;    ?>

                        <td align="center">
                            <a href="index.php?id=<?php echo $user['id']; ?>&action=save" >Save</a>
                        </td>
                        <td align="center">
                            <a href="index.php?id=<?php echo $user['id']; ?>&action=del" >Delete</a>
                        </td>




        </tr>
                </form>
            </table> <!-- START of TABLE-->
        </div>
    </div>
</div>
