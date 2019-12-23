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
        $this->pdo = new \PDO($dsn, DB_USER, DB_PASS, [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ]);
    }

    public function getSystemDatabases()
    {
        $stmt = $this->pdo->prepare(
            "SELECT * 
                FROM INFORMATION_SCHEMA.schemata
                WHERE schema_name IN ('information_schema', 'mysql', 'performance_schema')
                ORDER BY schema_name;"
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getDatabases()
    {
        $stmt = $this->pdo->prepare(
            "SELECT * 
                FROM INFORMATION_SCHEMA.schemata
                WHERE schema_name NOT IN ('information_schema', 'mysql', 'performance_schema')
                ORDER BY schema_name;"
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTables(string $dbName)
    {
        $stmt = $this->pdo->prepare(
            "SELECT *
                FROM INFORMATION_SCHEMA.tables
                WHERE TABLE_SCHEMA = '$dbName'
                ORDER BY table_schema, table_name;"
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createTable(object $object)
    {
        // $tableName = $obj
        // $this->pdo->exec('CREATE TABLE ')
    }

    public function getColumns(string $dbName, string $tableName)
    {
        $stmt = $this->pdo->prepare(
            "SELECT *
                FROM INFORMATION_SCHEMA.COLUMNS
                WHERE TABLE_NAME = '$tableName' AND TABLE_SCHEMA = '$dbName';"
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAll()
    {
    }

    public function get()
    {
    }

    public function search()
    {
    }

    public function delete()
    {
    }

    public function create()
    {
    }

    public function update()
    {
    }
}
