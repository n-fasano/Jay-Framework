<?php

namespace ORM;

use Services\CaseConverter;
use ORM\SQL\Database;
use ORM\SQL\Table;
use ORM\SQL\Column;

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

    public function hydrate(string $classname, array $data)
    {
        $object = new $classname;
        foreach ($data as $key => $value)
        {
            $methodName = 'set' . CaseConverter::toPascalCase($key);
            $reflection = new \ReflectionMethod($object, $methodName);

            $type = $reflection->getParameters()[0]->getType()->__toString();
            switch ($type)
            {
                case 'DateTime':
                    if ($value) {
                        $value = \DateTime::createFromFormat('Y-m-d H:i:s', $value);
                    }
                break;
                case 'int':
                case 'float':
                case 'string':
                case 'bool':
                    settype($value, $type);
                break;
            }

            $object->$methodName($value);
        }
        return $object;
    }

    public function hydrateAll(string $classname, array $multi)
    {
        $objects = [];
        foreach ($multi as $entry)
        {
            $objects[] = $this->hydrate($classname, $entry);
        }
        return $objects;
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
        $results = $stmt->fetchAll();
        return $this->hydrateAll(SQLDatabase::class, $results);
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
        $results = [];
        while ($result = $stmt->fetchObject(Database::class)) {
            $results[] = $result;
        }
        return $results;
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
        $results = [];
        while ($result = $stmt->fetchObject(Table::class)) {
            $results[] = $result;
        }
        return $results;
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
        $results = [];
        while ($result = $stmt->fetchObject(Column::class)) {
            $results[] = $result;
        }
        return $results;
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
