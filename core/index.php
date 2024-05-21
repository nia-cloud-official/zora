<?php

include "Engine.php";
include "./../Controllers/dbController.php";
define("ROOT","system/");

function createDatabase($name){
    $salt = "apple juice";
    $name = crypt($name,$salt);
    createDatabaseContainer($name);
    return $name;
}

function createDatabaseConfig($name){
    $configType = ".zoraConfig";
    file_put_contents("./" . ROOT . $name . "/" . $name. $configType, "");
    return 0;
}
function dropDatabaseContainer($name){
    return 0;
}
function createDatabaseContainer($name){


    $containerName = ROOT.$name;
    if(file_exists($containerName)){
    $containerName = $name.strval(rand(1,20000));
    chmod($containerName,755);
    mkdir(ROOT . $containerName);
    }else {
    $containerName = $name;
    chmod($containerName,755);
    mkdir(ROOT . $containerName);
    }
    echo $containerName;
    createDatabaseConfig($containerName);
    return $containerName;
}
createDatabase("appi");