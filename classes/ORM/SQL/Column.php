<?php

namespace ORM\SQL;

class Column
{
    /**
     * @String
     */
    private $TABLE_CATALOG;

    /**
     * @String
     */
    private $TABLE_SCHEMA;

    /**
     * @String
     */
    private $TABLE_NAME;

    /**
     * @String
     */
    private $COLUMN_NAME;

    /**
     * @String
     */
    private $ORDINAL_POSITION;

    /**
     * @String
     */
    private $COLUMN_DEFAULT;

    /**
     * @String
     */
    private $IS_NULLABLE;

    /**
     * @String
     */
    private $DATA_TYPE;

    /**
     * @String
     */
    private $CHARACTER_MAXIMUM_LENGTH;

    /**
     * @String
     */
    private $CHARACTER_OCTET_LENGTH;

    /**
     * @String
     */
    private $NUMERIC_PRECISION;

    /**
     * @String
     */
    private $NUMERIC_SCALE;

    /**
     * @String
     */
    private $DATETIME_PRECISION;

    /**
     * @String
     */
    private $CHARACTER_SET_NAME;

    /**
     * @String
     */
    private $COLLATION_NAME;

    /**
     * @String
     */
    private $COLUMN_TYPE;

    /**
     * @String
     */
    private $COLUMN_KEY;

    /**
     * @String
     */
    private $EXTRA;

    /**
     * @String
     */
    private $PRIVILEGES;

    /**
     * @String
     */
    private $COLUMN_COMMENT;

    /**
     * @String
     */
    private $IS_GENERATED;

    /**
     * @String
     */
    private $GENERATION_EXPRESSION;


    public function getTableCatalog(): ?string
    {
        return $this->TABLE_CATALOG;
    }

    public function setTableCatalog(?string $TABLE_CATALOG)
    {
        $this->TABLE_CATALOG = $TABLE_CATALOG;

        return $this;
    }

    public function getTableSchema(): ?string
    {
        return $this->TABLE_SCHEMA;
    }

    public function setTableSchema(?string $TABLE_SCHEMA)
    {
        $this->TABLE_SCHEMA = $TABLE_SCHEMA;

        return $this;
    }

    public function getTableName(): ?string
    {
        return $this->TABLE_NAME;
    }

    public function setTableName(?string $TABLE_NAME)
    {
        $this->TABLE_NAME = $TABLE_NAME;

        return $this;
    }

    public function getColumnName(): ?string
    {
        return $this->COLUMN_NAME;
    }

    public function setColumnName(?string $COLUMN_NAME)
    {
        $this->COLUMN_NAME = $COLUMN_NAME;

        return $this;
    }

    public function getOrdinalPosition(): ?string
    {
        return $this->ORDINAL_POSITION;
    }

    public function setOrdinalPosition(?string $ORDINAL_POSITION)
    {
        $this->ORDINAL_POSITION = $ORDINAL_POSITION;

        return $this;
    }

    public function getColumnDefault(): ?string
    {
        return $this->COLUMN_DEFAULT;
    }

    public function setColumnDefault(?string $COLUMN_DEFAULT)
    {
        $this->COLUMN_DEFAULT = $COLUMN_DEFAULT;

        return $this;
    }

    public function getIsNullable(): ?string
    {
        return $this->IS_NULLABLE;
    }

    public function setIsNullable(?string $IS_NULLABLE)
    {
        $this->IS_NULLABLE = $IS_NULLABLE;

        return $this;
    }

    public function getDataType(): ?string
    {
        return $this->DATA_TYPE;
    }

    public function setDataType(?string $DATA_TYPE)
    {
        $this->DATA_TYPE = $DATA_TYPE;

        return $this;
    }

    public function getCharacterMaximumLength(): ?string
    {
        return $this->CHARACTER_MAXIMUM_LENGTH;
    }

    public function setCharacterMaximumLength(?string $CHARACTER_MAXIMUM_LENGTH)
    {
        $this->CHARACTER_MAXIMUM_LENGTH = $CHARACTER_MAXIMUM_LENGTH;

        return $this;
    }

    public function getCharacterOctetLength(): ?string
    {
        return $this->CHARACTER_OCTET_LENGTH;
    }

    public function setCharacterOctetLength(?string $CHARACTER_OCTET_LENGTH)
    {
        $this->CHARACTER_OCTET_LENGTH = $CHARACTER_OCTET_LENGTH;

        return $this;
    }

    public function getNumericPrecision(): ?string
    {
        return $this->NUMERIC_PRECISION;
    }

    public function setNumericPrecision(?string $NUMERIC_PRECISION)
    {
        $this->NUMERIC_PRECISION = $NUMERIC_PRECISION;

        return $this;
    }

    public function getNumericScale(): ?string
    {
        return $this->NUMERIC_SCALE;
    }

    public function setNumericScale(?string $NUMERIC_SCALE)
    {
        $this->NUMERIC_SCALE = $NUMERIC_SCALE;

        return $this;
    }

    public function getDatetimePrecision(): ?string
    {
        return $this->DATETIME_PRECISION;
    }

    public function setDatetimePrecision(?string $DATETIME_PRECISION)
    {
        $this->DATETIME_PRECISION = $DATETIME_PRECISION;

        return $this;
    }

    public function getCharacterSetName(): ?string
    {
        return $this->CHARACTER_SET_NAME;
    }

    public function setCharacterSetName(?string $CHARACTER_SET_NAME)
    {
        $this->CHARACTER_SET_NAME = $CHARACTER_SET_NAME;

        return $this;
    }

    public function getCollationName(): ?string
    {
        return $this->COLLATION_NAME;
    }

    public function setCollationName(?string $COLLATION_NAME)
    {
        $this->COLLATION_NAME = $COLLATION_NAME;

        return $this;
    }

    public function getColumnType(): ?string
    {
        return $this->COLUMN_TYPE;
    }

    public function setColumnType(?string $COLUMN_TYPE)
    {
        $this->COLUMN_TYPE = $COLUMN_TYPE;

        return $this;
    }

    public function getColumnKey(): ?string
    {
        return $this->COLUMN_KEY;
    }

    public function setColumnKey(?string $COLUMN_KEY)
    {
        $this->COLUMN_KEY = $COLUMN_KEY;

        return $this;
    }

    public function getExtra(): ?string
    {
        return $this->EXTRA;
    }

    public function setExtra(?string $EXTRA)
    {
        $this->EXTRA = $EXTRA;

        return $this;
    }

    public function getPrivileges(): ?string
    {
        return $this->PRIVILEGES;
    }

    public function setPrivileges(?string $PRIVILEGES)
    {
        $this->PRIVILEGES = $PRIVILEGES;

        return $this;
    }

    public function getColumnComment(): ?string
    {
        return $this->COLUMN_COMMENT;
    }

    public function setColumnComment(?string $COLUMN_COMMENT)
    {
        $this->COLUMN_COMMENT = $COLUMN_COMMENT;

        return $this;
    }

    public function getIsGenerated(): ?string
    {
        return $this->IS_GENERATED;
    }

    public function setIsGenerated(?string $IS_GENERATED)
    {
        $this->IS_GENERATED = $IS_GENERATED;

        return $this;
    }

    public function getGenerationExpression(): ?string
    {
        return $this->GENERATION_EXPRESSION;
    }

    public function setGenerationExpression(?string $GENERATION_EXPRESSION)
    {
        $this->GENERATION_EXPRESSION = $GENERATION_EXPRESSION;

        return $this;
    }

}