<?php
include_once './../Models/_redirects.php';
$loginPageUrl = "./login.php";
session_abort();
session_destroy();
redirect($loginPageUrl);
