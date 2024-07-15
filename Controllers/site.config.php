<?php

/**
 * Author: Milton Vafana
 * Email : miltonhyndrex@gmail.com
 * Github: https://github.com/nia-cloud-official
 */

define("SITENAME", "Zora");
define("SITE_DESCRIPTION", "A fully featured data tool for data visualization , editing and more!");
define("Company", "Odyssey");
define("URL", "http://localhost/akuma/");
define("Email", "milton@odyssey.co.zw");
define("Github", "https://www.github.com/nia-cloud-official");
define("Tel", "+263715212928");
define("Developer", "Milton Vafana");
define("SERVER", "localhost");
define("USER", "milto");
define("PASS", "lola");
define("DBNAME", "akuma");

try {
    $pdo = new PDO("mysql:host=" . SERVER . ";dbname=" . DBNAME, USER, PASS);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Display the connection error message
    die("Connection failed: " . $e->getMessage());
}
