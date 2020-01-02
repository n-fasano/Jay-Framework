<?php

namespace ORM\SQL;

use ORM\QueryInterface;

class Query implements QueryInterface
{
    private $select;
    private $from;
    private $where = 'WHERE 1 ';
    private $parameters = [];

    public function select(string $select)
    {
        $this->select = "SELECT $select ";

        return $this;
    }

    public function from(string $from)
    {
        $this->from = "FROM $from ";
        
        return $this;
    }

    public function where(string $where)
    {
        $this->where .= "AND $where ";
        
        return $this;
    }

    public function set(string $parameter, $value)
    {
        $this->parameters[$parameter] = htmlspecialchars($value);

        return $this;
    }

    private function build(): string
    {
        return
            $this->select .
            $this->from .
            $this->where
        ;
    }

    public function execute()
    {
        $sql = $this->build;
        $pdoquery = '';
        $pdo->prepare();
    }
}