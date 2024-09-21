<?php

namespace Core;
use PDO;

class Database
{
    public $connection;
    public $statement;

    //  Each time we call query function for every query we would implement,
    //  then instead of starting whole loading process everytime from scratch
    //  We are initializing it while instance is being created by method __construct
    //  so that we don't have to start process from start over and over again after calling query function
    public function __construct($config, $username = 'root', $password = 'Magic@123')
    {
        //      Array $config which we shifted in the config.php file, is a refactoring for hard coded values of the line of code below to make it dynamic
        //      $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};password=Magic@123;charset={$config['charset']}";
        //      Below function is a refactoring for below custom variable $dsn, more dynamic

        $dsn = 'mysql:' . http_build_query($config, "", ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    //    Returning object below so that we can use other methods with same instance for variables.
    //    Checkout method chaining
    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }
    public function find()
    {
        return $this->statement->fetch();
    }
    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort(Response::NOT_FOUND);
        }
    }
}