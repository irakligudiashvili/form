<?php

require_once "header.php";

require_once 'classes/Db.php';

$db = new Db();

if(isset($_POST['email'])){
    $user = $db->addUser($_POST['fname'], $_POST['lname'], $_POST['email']);
}


?>

    <form class="form" id="form">
        <span id="message" class="success"></span>
        <br>
        <label class="form-label">First Name</label>
        <input class="form-input" id="fname" type="text" name="fname">
        <span class="error" id="errorFname"></span>
        <label class="form-label">Last Name</label>
        <input class="form-input" id="lname" type="text" name="lname">
        <span class="error" id="errorLname"></span>
        <label class="form-label">Email</label>
        <input class="form-input" id="email" type="email" name="email">
        <span class="error" id="errorEmail"></span>
        <br>
        <button class="form-btn" type="button" name="submit" id="add">Add</button>
    </form>

</body>
</html>