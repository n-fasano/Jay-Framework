<?php

namespace ORM;

class SQLColumn
{
    /**
     * @String
     */
    private $tableCatalog;

    /**
     * @String
     */
    private $tableSchema;

    /**
     * @String
     */
    private $tableName;

    /**
     * @String
     */
    private $columnName;

    /**
     * @Int
     */
    private $ordinalPosition;

    /**
     * @String
     */
    private $columnDefault;

    /**
     * @String
     */
    private $isNullable;

    /**
     * @String
     */
    private $dataType;

    /**
     * @Int
     */
    private $characterMaximumLength;

    /**
     * @Int
     */
    private $characterOctetLength;

    /**
     * @Int
     */
    private $numericPrecision;

    /**
     * @Int
     */
    private $numericScale;

    /**
     * @String
     */
    private $datetimePrecision;

    /**
     * @String
     */
    private $characterSetName;

    /**
     * @String
     */
    private $collationName;

    /**
     * @String
     */
    private $columnType;

    /**
     * @String
     */
    private $columnKey;

    /**
     * @String
     */
    private $extra;

    /**
     * @String
     */
    private $privileges;

    /**
     * @String
     */
    private $columnComment;

    /**
     * @String
     */
    private $isGenerated;

    /**
     * @String
     */
    private $generationExpression;


    public function getTableCatalog(): ?string
    {
        return $this->tableCatalog;
    }

    public function setTableCatalog(?string $tableCatalog)
    {
        $this->tableCatalog = $tableCatalog;

        return $this;
    }

    public function getTableSchema(): ?string
    {
        return $this->tableSchema;
    }

    public function setTableSchema(?string $tableSchema)
    {
        $this->tableSchema = $tableSchema;

        return $this;
    }

    public function getTableName(): ?string
    {
        return $this->tableName;
    }

    public function setTableName(?string $tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    public function getColumnName(): ?string
    {
        return $this->columnName;
    }

    public function setColumnName(?string $columnName)
    {
        $this->columnName = $columnName;

        return $this;
    }

    public function getOrdinalPosition(): ?int
    {
        return $this->ordinalPosition;
    }

    public function setOrdinalPosition(?int $ordinalPosition)
    {
        $this->ordinalPosition = $ordinalPosition;

        return $this;
    }

    public function getColumnDefault(): ?string
    {
        return $this->columnDefault;
    }

    public function setColumnDefault(?string $columnDefault)
    {
        $this->columnDefault = $columnDefault;

        return $this;
    }

    public function getIsNullable(): ?string
    {
        return $this->isNullable;
    }

    public function setIsNullable(?string $isNullable)
    {
        $this->isNullable = $isNullable;

        return $this;
    }

    public function getDataType(): ?string
    {
        return $this->dataType;
    }

    public function setDataType(?string $dataType)
    {
        $this->dataType = $dataType;

        return $this;
    }

    public function getCharacterMaximumLength(): ?int
    {
        return $this->characterMaximumLength;
    }

    public function setCharacterMaximumLength(?int $characterMaximumLength)
    {
        $this->characterMaximumLength = $characterMaximumLength;

        return $this;
    }

    public function getCharacterOctetLength(): ?int
    {
        return $this->characterOctetLength;
    }

    public function setCharacterOctetLength(?int $characterOctetLength)
    {
        $this->characterOctetLength = $characterOctetLength;

        return $this;
    }

    public function getNumericPrecision(): ?int
    {
        return $this->numericPrecision;
    }

    public function setNumericPrecision(?int $numericPrecision)
    {
        $this->numericPrecision = $numericPrecision;

        return $this;
    }

    public function getNumericScale(): ?int
    {
        return $this->numericScale;
    }

    public function setNumericScale(?int $numericScale)
    {
        $this->numericScale = $numericScale;

        return $this;
    }

    public function getDatetimePrecision(): ?string
    {
        return $this->datetimePrecision;
    }

    public function setDatetimePrecision(?string $datetimePrecision)
    {
        $this->datetimePrecision = $datetimePrecision;

        return $this;
    }

    public function getCharacterSetName(): ?string
    {
        return $this->characterSetName;
    }

    public function setCharacterSetName(?string $characterSetName)
    {
        $this->characterSetName = $characterSetName;

        return $this;
    }

    public function getCollationName(): ?string
    {
        return $this->collationName;
    }

    public function setCollationName(?string $collationName)
    {
        $this->collationName = $collationName;

        return $this;
    }

    public function getColumnType(): ?string
    {
        return $this->columnType;
    }

    public function setColumnType(?string $columnType)
    {
        $this->columnType = $columnType;

        return $this;
    }

    public function getColumnKey(): ?string
    {
        return $this->columnKey;
    }

    public function setColumnKey(?string $columnKey)
    {
        $this->columnKey = $columnKey;

        return $this;
    }

    public function getExtra(): ?string
    {
        return $this->extra;
    }

    public function setExtra(?string $extra)
    {
        $this->extra = $extra;

        return $this;
    }

    public function getPrivileges(): ?string
    {
        return $this->privileges;
    }

    public function setPrivileges(?string $privileges)
    {
        $this->privileges = $privileges;

        return $this;
    }

    public function getColumnComment(): ?string
    {
        return $this->columnComment;
    }

    public function setColumnComment(?string $columnComment)
    {
        $this->columnComment = $columnComment;

        return $this;
    }

    public function getIsGenerated(): ?string
    {
        return $this->isGenerated;
    }

    public function setIsGenerated(?string $isGenerated)
    {
        $this->isGenerated = $isGenerated;

        return $this;
    }

    public function getGenerationExpression(): ?string
    {
        return $this->generationExpression;
    }

    public function setGenerationExpression(?string $generationExpression)
    {
        $this->generationExpression = $generationExpression;

        return $this;
    }
}