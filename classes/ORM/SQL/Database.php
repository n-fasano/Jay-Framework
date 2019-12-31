<?php

namespace ORM\SQL;

class Database
{
    /**
     * @String
     */
    private $CATALOG_NAME;

    /**
     * @String
     */
    private $SCHEMA_NAME;

    /**
     * @String
     */
    private $DEFAULT_CHARACTER_SET_NAME;

    /**
     * @String
     */
    private $DEFAULT_COLLATION_NAME;

    /**
     * @String
     */
    private $SQL_PATH;


    public function getCatalogName(): ?string
    {
        return $this->CATALOG_NAME;
    }

    public function setCatalogName(?string $CATALOG_NAME)
    {
        $this->CATALOG_NAME = $CATALOG_NAME;

        return $this;
    }

    public function getSchemaName(): ?string
    {
        return $this->SCHEMA_NAME;
    }

    public function setSchemaName(?string $SCHEMA_NAME)
    {
        $this->SCHEMA_NAME = $SCHEMA_NAME;

        return $this;
    }

    public function getDefaultCharacterSetName(): ?string
    {
        return $this->DEFAULT_CHARACTER_SET_NAME;
    }

    public function setDefaultCharacterSetName(?string $DEFAULT_CHARACTER_SET_NAME)
    {
        $this->DEFAULT_CHARACTER_SET_NAME = $DEFAULT_CHARACTER_SET_NAME;

        return $this;
    }

    public function getDefaultCollationName(): ?string
    {
        return $this->DEFAULT_COLLATION_NAME;
    }

    public function setDefaultCollationName(?string $DEFAULT_COLLATION_NAME)
    {
        $this->DEFAULT_COLLATION_NAME = $DEFAULT_COLLATION_NAME;

        return $this;
    }

    public function getSqlPath(): ?string
    {
        return $this->SQL_PATH;
    }

    public function setSqlPath(?string $SQL_PATH)
    {
        $this->SQL_PATH = $SQL_PATH;

        return $this;
    }
}