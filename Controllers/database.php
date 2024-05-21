<?php

require_once './../controllers/dbController.php';
require_once './../config/core.php';

class database
{
    private $dBcontroller;
    private $queryAnalysis;

    public function __construct($file)
    {
        $this->dBcontroller = new dataController();
        $this->queryAnalysis = new Core($file);
    }

// Method to connect to the database
    public function connect($hostname, $username, $password, $database)
    {
        $this->dBcontroller->connect($hostname, $username, $password, $database);
    }

// Method to execute a query
    public function query($query)
    {
        $parsedQuery = $this->queryAnalysis->parseQuery($query);
        $result = $this->dBcontroller->query($parsedQuery);
        return $result;
    }

// Method to close the database connection
    public function close()
    {
        $this->dBcontroller->close();

    }
}
