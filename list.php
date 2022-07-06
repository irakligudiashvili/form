<?php

require_once "header.php";

require_once 'classes/Db.php';

$db = new Db();
$users = $db->get();

if(isset($_POST['id'])){
    $delete = $db->delete($_POST['id']);
}

?>

    <table class="table">
        <tr class="table-tr table-tr-header">
            <th class="table-th">First Name</th>
            <th class="table-th">Last Name</th>
            <th class="table-th">Email</th>
            <th class="table-th"></th>
        </tr>
        <?php

        foreach($users as $user){
            ?>
            <tr class="table-tr">
                <td class="table-td"><?php echo $user['first_name'] ?></td>
                <td class="table-td"><?php echo $user['last_name'] ?></td>
                <td class="table-td"><?php echo $user['email'] ?></td>
                <td class="table-td"><button id="<?php echo $user['id']?>" class="delete">Delete</button></td>
            </tr>
            <?php
        }

        ?>
    </table>

    

</body>
</html>