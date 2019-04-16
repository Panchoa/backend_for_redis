<?php
/**
 * Created by PhpStorm.
 * User: Panchoa
 * Date: 16/04/2019
 * Time: 11:52
 */
if (isset($_POST["publier"])){
    if (isset($_POST["note"])) {
        setNote("notes", $_POST["notes"]);
    }
}elseif (isset($_POST["delete"])){
    delAllNotes("notes");
}


?>
<html>
<body>

<form method="post">
    Note: <input type="text" name="note"><br>
    <input type="submit" name="publier" value="Publier">
</form>

<div>
    <h3>Notes</h3>
    <span>
        <?php
        $notes = getNote("notes");
        print_r($notes);
        ?>
    </span>
    <form method="post">
        <input type="submit" name="delete" value="Supprimer les notes">
    </form>
</div>
</body>
</html>
