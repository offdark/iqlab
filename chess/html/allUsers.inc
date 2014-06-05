<div class="container-content">
    <div class="white-block">
        <div class="content-heading">

            <h1> List off all users </h1>

            <table border="0" width="700" > <!-- START of TABLE -->

                <tr bgcolor="#C9D3DC">

                    <?php foreach( $admin->allUsers() as $key => $values  ): ?>
                        <th><?php echo $key; ?> </th>




                </tr>
                <form method="POST" action="">
                    <tr>
                    <?php foreach( $values as $value  ): ?>

                            <td align="center"><?php echo $value; ?> </td>


                    <?php   endforeach;    ?>
                        <td align="center">
                            <a href="admin.php?reset_id=<?php  ?>" onclick="return counter_reset()"> Edit </a>
                        </td>
                        <td align="center">
                            <a href="admin.php?id=<?php ?>" onclick="return deleletconfig()"> Delete </a>
                        </td>
                        <?php   endforeach;    ?>

                    </tr>
                </form>
            </table> <!-- START of TABLE-->
        </div>
    </div>
</div>
