<?php
/**
 * Created by PhpStorm.
 * User: Panchoa
 * Date: 16/04/2019
 * Time: 10:53
 */
require "predis/autoload.php";
\Predis\Autoloader::register();

//Connexion à notre Redis "local"
$redisObj = new \Predis\Client("tcp://redis:6379");

function openRedisConnection($hostname, $port){
    global $redisObj;
    $redisObj->connect($hostname, $port);
    return $redisObj;
}

//Ajout de valeur donnée pour la clé entrée en paramètre dans Redis
function setNote($key, $value){
    try{
        global $redisObj;
        $redisObj->rpush($key, $value);
    }catch (Exception $e) {
        echo $e->getMessage();
    }
}

//Récupère les valeurs en fonction de la clé donnée en paramètre
function getNote($key){
    try{
        global $redisObj;
        return $redisObj->lrange($key, 0, -1);
    }catch (Exception $e){
        echo $e->getMessage();
    }
}

//Supprime la dernière valeur de la liste contenant les notes
function delLastNote($key){
    try{
        global $redisObj;
        $redisObj->lpop($key);
    }catch (Exception $e){
        echo $e->getMessage();
    }
}
//Supprime toute la liste contenant les notes
function delAllNotes($key){
    try{
        global $redisObj;
        $redisObj->del($key);
    }catch (Exception $e){
        echo $e->getMessage();
    }
}