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
function test($name){
    $salt = "apple juice";
    $name = crypt($name,$salt);
    echo $name;
}
function writeDefaultConfig($containerName) {
    $configType = ".zoraConfig";
    $configPath = "./" . $containerName . $configType;
    $defaultConfig = [
    "database_host" => "localhost",
    "database_username" => "root",
    "database_password" => "",
    "database_name" => "zora_db",
    "api_key" => "1234567890abcdef",
    "api_secret" => "my_api_secret",
    "app_name" => "Zora App",
    "app_version" => "1.0.0",
    "app_description" => "A sample app for demo purposes",
    "debug_mode" => true,
    "debug_level" => 3,
    "custom_setting_1" => "value1",
    "custom_setting_2"=> "value2"
    ];
    file_put_contents($configPath, implode("\n", array_map(function($key, $value) {
    return $key . "=" . $value;
    }, array_keys($defaultConfig), $defaultConfig)));
}
function createDatabaseConfig($name){
    $containerPath = "./" .  $name . "/";
    if (!file_exists($containerPath)) {
    mkdir($containerPath);
    chmod($containerPath, 0755);
    }else {
        $i = 1;
        if(file_exists($containerPath)) {
            $containerName = ROOT . $name . '_' . strval($i);
            $i++;
            }
    }
    writeDefaultConfig($containerPath . $name);
    echo $containerName;
    return 0;
}
function dropDatabaseContainer($name){
    $containerPath = "./" . ROOT . $name . "/";
    if (file_exists($containerPath)) {
    rrmdir($containerPath);
    }
    return 0;
}
function rrmdir($dir) {
    if (is_dir($dir)) {
    $objects = scandir($dir);
    foreach ($objects as $object) {
        if ($object != "." && $object != "..") {
        if (filetype($dir . "/" . $object) == "dir") rrmdir($dir . "/" . $object); else unlink($dir . "/" . $object);
        }
    }
    reset($objects);
    rmdir($dir);
    }
}

function createDatabaseContainer($name) {
    $containerName = ROOT . $name;
    $i = 1;
    while (file_exists($containerName)) {
    $containerName = $name . '_' . strval($i);
    $i++;
    }
    mkdir($containerName);
    createDatabaseConfig($containerName);
    return $containerName;
}

function readConfigFile($file) {
    // Load the config file
    $config_file = file("./" .$file. "/". $file . '.zoraConfig', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    // Create an associative array to store the config values
    $config = array();
    // Loop through each line in the config file
    foreach ($config_file as $line) {
    // Split the line into key and value
    list($key, $value) = explode('=', $line);
    // Trim any whitespace from the key and value
    $key = trim($key);
    $value = trim($value);
    // Store the key-value pair in the config array
    $config[$key] = $value;
}

// Now you can access specific parts of the config file like this:
echo $config['database_host']; // Outputs: localhost
echo $config['database_username']; // Outputs: root
echo $config['autoSave']; // Outputs: password
}


function writeSystemFiles($name){
    $server_frame = file_get_contents("./_ser.zora");
    $packageManagerContext = file_get_contents("./package.json.zora");
    // Create the directory
    mkdir("./" . $name);
    mkdir("./" . $name . "/public");
    // Create the server.js file
    file_put_contents("./" . $name . "/server.js", $server_frame);
    // Create the package.json file
    file_put_contents("./" . $name . "/package.json", $packageManagerContext);
    // Create the index.html file
    $index_html = "<html><head><link rel='stylesheet' href='style.css'></head><body></body></html>";
    file_put_contents("./" . $name . "/public/index.html", $index_html);
    // Create the style.css file
    $style_css = "body { background-color: #f2f2f2; }";
    file_put_contents("./" . $name . "/public/style.css", $style_css);
}



function runServer($name){
    $result = shell_exec("node -v");
    if(!$result){
    echo "Please install Node.js";
    }else{
      chdir($name); // instead of system("cd" . " ". $name);
    $result = shell_exec("npm run start");
    if(!$result){
        echo "An error occurred on our end, We are working on it!";
    }else{
        echo "<code>$result</code>";
    }
}
}
runServer("smoke_6");