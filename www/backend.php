<?php
/**
 * Created by PhpStorm.
 * User: Panchoa
 * Date: 16/04/2019
 * Time: 10:53
 */
require "predis/autoload.php";
\Predis\Autoloader::register();

$redisObj = new \Predis\Client();

function openRedisConnection($hostname, $port){
    global $redisObj;
    $redisObj->connect($hostname, $port);
    return $redisObj;
}

//Ajout de valeur donnée pour la clé entrée en paramètre dans Redis
function setNote($key, $value){
    try{
        global $redisObj;
        $redisObj->set($key, $value);
    }catch (Exception $e) {
        echo $e->getMessage();
    }
}

//Récupère les valeurs en fonction de la clé donnée en paramètre
function getNote($key){
    try{
        global $redisObj;
        return $redisObj->get($key);
    }catch (Exception $e){
        echo $e->getMessage();
    }
}
