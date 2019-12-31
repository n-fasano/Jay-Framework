<?php

namespace ORM;

class SQLDatabase
{
    /**
     * @String
     */
    private $catalogName;
        
    /**
     * string
     */
    private $schemaName;
        
    /**
     * string
     */
    private $defaultCharacterSetName;
        
    /**
     * string
     */
    private $defaultCollationName;
        
    /**
     * string
     */
    private $sqlPath;
    
    /**
     * array
     * @Link SQLTable TABLE_SCHEMA 
     */
    private $tables;
        
    public function getCatalogName(): ?string
    {
        return $this->catalogName;
    }

    public function setCatalogName(?string $catalogName)
    {
        $this->catalogName = $catalogName;

        return $this;
    }

    public function getSchemaName(): ?string
    {
        return $this->schemaName;
    }

    public function setSchemaName(?string $schemaName)
    {
        $this->schemaName = $schemaName;

        return $this;
    }

    public function getDefaultCharacterSetName(): ?string
    {
        return $this->defaultCharacterSetName;
    }

    public function setDefaultCharacterSetName(?string $defaultCharacterSetName)
    {
        $this->defaultCharacterSetName = $defaultCharacterSetName;

        return $this;
    }

    public function getDefaultCollationName(): ?string
    {
        return $this->defaultCollationName;
    }

    public function setDefaultCollationName(?string $defaultCollationName)
    {
        $this->defaultCollationName = $defaultCollationName;

        return $this;
    }

    public function getSqlPath(): ?string
    {
        return $this->sqlPath;
    }

    public function setSqlPath(?string $sqlPath)
    {
        $this->sqlPath = $sqlPath;

        return $this;
    }

    public function setTables()
    {

    }

    public function getTables()
    {
        
    }
}