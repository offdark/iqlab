<div class="container-content">
    <div class="white-block">
        <div class="content-heading">

            <h1> List off all users </h1>

            <table border="0" width="100%" > <!-- START of TABLE -->

                <tr bgcolor="#C9D3DC">

                    <?php   foreach( $list[0]  as $key => $values  ): ?>
                        <th><?php echo $key; ?> </th>

                    <?php   endforeach;    ?>

                    <th colspan="2">Edit</th>
                </tr>
                    <?php   foreach( $list  as $key => $values  ): ?>
                    <tr>

                    <?php foreach( $values as $value  ): ?>

                            <td align="center"><?php echo $value; ?> </td>


                    <?php   endforeach;    ?>

                        <td align="center">
                            <a href="index.php?id=<?php echo $values['id']; ?>&action=edit" >Edit</a>
                        </td>
                        <td align="center">
                            <a href="index.php?id=<?php echo $values['id']; ?>&action=del" >Delete</a>
                        </td>

                   <?php   endforeach;    ?>

                    </tr>
            </table> <!-- START of TABLE-->
        </div>
    </div>
</div>
