<?php
/**
 * Created by PhpStorm.
 * User: Panchoa
 * Date: 16/04/2019
 * Time: 11:52
 */

require "predis/autoload.php";
\Predis\Autoloader::register();

$redisObj = new \Predis\Client("tcp://redis:6379");

if (isset($_POST["note"])) {
    $redisObj->rpush("notestest", [ $_POST["note"] ]);
}

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
        $notes = $redisObj->lrange("notestest", 0, -1);
        print_r($notes);
        ?>
    </span>
</div>
</body>
</html>
