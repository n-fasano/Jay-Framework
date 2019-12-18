<?php

namespace ORM;

class ORM
{
    protected $pdo;

    public function __construct()
    {
        $dbtype = 'mysql';
        $dbname = DB_NAME;
        $dbhost = DB_HOST;
        $dsn = "$dbtype:dbname=$dbname;host=$dbhost";
        $this->pdo = new \PDO($dsn, DB_USER, DB_PASS);
    }

    public function getAll()
    { }

    public function get()
    { }

    public function search()
    { }

    public function delete()
    { }

    public function create()
    { }

    public function update()
    { }
}
