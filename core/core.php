<?php

define('__DIR__', 'http://localhost/zora/');

define('__APPNAME__', 'Zora Lumin');

define('home', 'index.php');

class Process
{
    private $dummy = "public/"; # this main folder holding all the view;
    function __construct()
    {
        $dummy = $this->dummy;
        //$this->__loadMainView($dummy . home);
    }
    function __loadMainView($location)
    {
        header('Location: ' . $location);
    }
    function checkCredentials()
    {
        if (empty($host) || empty($user) || empty($pass)) {
            echo
                "
                <center>
                <div class='content-wrapper'>
                <div class='col-lg-4 flex-margin'>
                <div class='card'>
                <div class='card-body'>
                 <div class='row'>
                    <h4 class='card-title'>Zora Connection Setup</h4>
                    <p class='card-description'>To get started with Zora please establish a connection first!</p>
                    <form class='forms-sample' method='post'action=''>
                      <div class='form-group'>
                        <label for='exampleInputUsername1'>Host</label>
                        <input type='text' class='form-control' id='exampleInputUsername1' name='host' placeholder='Host'>
                      </div>
                      <div class='form-group'>
                        <label for='exampleInputEmail1'>Username</label>
                        <input type='text' class='form-control' name='username' id='exampleInputEmail1' placeholder='Username'>
                      </div>
                      <div class='form-group'>
                        <label for='exampleInputPassword1'>Password</label>
                        <input type='password' class='form-control' name='password' id='exampleInputPassword1' placeholder='Password'>
                      </div>
                      <button type='submit' class='btn btn-gradient-primary me-2'>Connect</button>
                    </form>
                  </div>
                  </div>
              </div>
                </div>
                </div>
                </center>
            ";
        } else {
            echo "Your credentials have been set.";
        }
    }
    function startApp()
    {
        $this->checkCredentials();
    }

    function establishConnection($host,$username,$password){ 
        $userConn = mysqli_connect($host,$username,$password);
        if(!mysqli_connect_error()){
            echo "Successfully established connection";
            header('location: public/index.view.php');
        }else{
            echo "Unable to establish connection";
        }
    }
}

$action = new Process();
if(isset($_POST['host'])){ 
    $host = $_POST['host'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $action->establishConnection($host,$username,$password);
    header('location: public/index.view.php');
}else{ 
    echo "Your credentials have not been set.";
}
?>