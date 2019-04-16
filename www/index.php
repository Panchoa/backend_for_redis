<?php
/**
 * Created by PhpStorm.
 * User: Panchoa
 * Date: 16/04/2019
 * Time: 11:52
 */

require "backend.php";

setNote("note", $_POST["note"]);
?>
<html>
<body>

<form method="post">
    Note: <input type="text" name="note"><br>
    <input type="submit">
</form>

<div>
    <h3>Notes</h3>
    <span>
        <?php
        getNote("note")
        ?>
    </span>
</div>
</body>
</html>
