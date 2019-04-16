<?php
require "predis/autoload.php";
\Predis\Autoloader::register();

$redisObj = new \Predis\Client("tcp://redis:6379");

if ($_SERVER["REQUEST_METHOD"] == 'POST') 
{
    $uuid = uniqid();
    if ($_POST["note"] != "") 
    {
        $redisObj->hmset("notes", array($uuid => $_POST["note"]));
        echo $uuid . "\n";
    }
} 
elseif ($_SERVER["REQUEST_METHOD"] == 'GET') 
{
    if ($_GET["id"] != "")
    {
        echo $redisObj->hmget("notes", $_GET["id"])[0] . "\n";
    }
    else 
    {
        $keys = $redisObj->hkeys("notes");
        foreach ($keys as $key)
        {
            echo $key . ";" . $redisObj->hmget("notes", $key)[0] . "\n";
        }
    }
}
elseif ($_SERVER["REQUEST_METHOD"] == 'DELETE')
{
    if ($_GET["id"] != "")
    {
        $redisObj->hdel("notes", $_GET["id"]);
    }
    else
    {
        $redisObj->del("notes");
    }
}

?>
