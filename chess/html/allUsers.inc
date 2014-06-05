<div class="container-content">
    <div class="white-block">
        <div class="content-heading">

            <h1> List off all users </h1>

            <table border="0" width="700" > <!-- START of TABLE -->

                <tr bgcolor="#C9D3DC">

                    <?php   foreach( $list[0]  as $key => $values  ): ?>
                        <th><?php echo $key; ?> </th>

                    <?php   endforeach;    ?>

                    <th colspan="2">Edit</th>
                </tr>
                <form method="POST" action="">
                    <?php   foreach( $list  as $key => $values  ): ?>
                    <tr>

                    <?php foreach( $values as $value  ): ?>

                            <td align="center"><?php echo $value; ?> </td>


                    <?php   endforeach;    ?>

                   <?php   endforeach;    ?>

                    </tr>
                    <td align="center">
                        <a href="admin.php?reset_id=<?php  ?>" onclick="return counter_reset()"> Edit </a>
                    </td>
                    <td align="center">
                        <a href="admin.php?id=<?php ?>" onclick="return deleletconfig()"> Delete </a>
                    </td>

        </tr>
                </form>
            </table> <!-- START of TABLE-->
        </div>
    </div>
</div>
