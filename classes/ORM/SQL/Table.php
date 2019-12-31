<?php

namespace ORM\SQL;

class Table
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
    private $TABLE_TYPE;

    /**
     * @String
     */
    private $ENGINE;

    /**
     * @String
     */
    private $VERSION;

    /**
     * @String
     */
    private $ROW_FORMAT;

    /**
     * @String
     */
    private $TABLE_ROWS;

    /**
     * @String
     */
    private $AVG_ROW_LENGTH;

    /**
     * @String
     */
    private $DATA_LENGTH;

    /**
     * @String
     */
    private $MAX_DATA_LENGTH;

    /**
     * @String
     */
    private $INDEX_LENGTH;

    /**
     * @String
     */
    private $DATA_FREE;

    /**
     * @String
     */
    private $AUTO_INCREMENT;

    /**
     * @String
     */
    private $CREATE_TIME;

    /**
     * @String
     */
    private $UPDATE_TIME;

    /**
     * @String
     */
    private $CHECK_TIME;

    /**
     * @String
     */
    private $TABLE_COLLATION;

    /**
     * @String
     */
    private $CHECKSUM;

    /**
     * @String
     */
    private $CREATE_OPTIONS;

    /**
     * @String
     */
    private $TABLE_COMMENT;

    /**
     * @String
     */
    private $MAX_INDEX_LENGTH;

    /**
     * @String
     */
    private $TEMPORARY;


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

    public function getTableType(): ?string
    {
        return $this->TABLE_TYPE;
    }

    public function setTableType(?string $TABLE_TYPE)
    {
        $this->TABLE_TYPE = $TABLE_TYPE;

        return $this;
    }

    public function getEngine(): ?string
    {
        return $this->ENGINE;
    }

    public function setEngine(?string $ENGINE)
    {
        $this->ENGINE = $ENGINE;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->VERSION;
    }

    public function setVersion(?string $VERSION)
    {
        $this->VERSION = $VERSION;

        return $this;
    }

    public function getRowFormat(): ?string
    {
        return $this->ROW_FORMAT;
    }

    public function setRowFormat(?string $ROW_FORMAT)
    {
        $this->ROW_FORMAT = $ROW_FORMAT;

        return $this;
    }

    public function getTableRows(): ?string
    {
        return $this->TABLE_ROWS;
    }

    public function setTableRows(?string $TABLE_ROWS)
    {
        $this->TABLE_ROWS = $TABLE_ROWS;

        return $this;
    }

    public function getAvgRowLength(): ?string
    {
        return $this->AVG_ROW_LENGTH;
    }

    public function setAvgRowLength(?string $AVG_ROW_LENGTH)
    {
        $this->AVG_ROW_LENGTH = $AVG_ROW_LENGTH;

        return $this;
    }

    public function getDataLength(): ?string
    {
        return $this->DATA_LENGTH;
    }

    public function setDataLength(?string $DATA_LENGTH)
    {
        $this->DATA_LENGTH = $DATA_LENGTH;

        return $this;
    }

    public function getMaxDataLength(): ?string
    {
        return $this->MAX_DATA_LENGTH;
    }

    public function setMaxDataLength(?string $MAX_DATA_LENGTH)
    {
        $this->MAX_DATA_LENGTH = $MAX_DATA_LENGTH;

        return $this;
    }

    public function getIndexLength(): ?string
    {
        return $this->INDEX_LENGTH;
    }

    public function setIndexLength(?string $INDEX_LENGTH)
    {
        $this->INDEX_LENGTH = $INDEX_LENGTH;

        return $this;
    }

    public function getDataFree(): ?string
    {
        return $this->DATA_FREE;
    }

    public function setDataFree(?string $DATA_FREE)
    {
        $this->DATA_FREE = $DATA_FREE;

        return $this;
    }

    public function getAutoIncrement(): ?string
    {
        return $this->AUTO_INCREMENT;
    }

    public function setAutoIncrement(?string $AUTO_INCREMENT)
    {
        $this->AUTO_INCREMENT = $AUTO_INCREMENT;

        return $this;
    }

    public function getCreateTime(): ?string
    {
        return $this->CREATE_TIME;
    }

    public function setCreateTime(?string $CREATE_TIME)
    {
        $this->CREATE_TIME = $CREATE_TIME;

        return $this;
    }

    public function getUpdateTime(): ?string
    {
        return $this->UPDATE_TIME;
    }

    public function setUpdateTime(?string $UPDATE_TIME)
    {
        $this->UPDATE_TIME = $UPDATE_TIME;

        return $this;
    }

    public function getCheckTime(): ?string
    {
        return $this->CHECK_TIME;
    }

    public function setCheckTime(?string $CHECK_TIME)
    {
        $this->CHECK_TIME = $CHECK_TIME;

        return $this;
    }

    public function getTableCollation(): ?string
    {
        return $this->TABLE_COLLATION;
    }

    public function setTableCollation(?string $TABLE_COLLATION)
    {
        $this->TABLE_COLLATION = $TABLE_COLLATION;

        return $this;
    }

    public function getChecksum(): ?string
    {
        return $this->CHECKSUM;
    }

    public function setChecksum(?string $CHECKSUM)
    {
        $this->CHECKSUM = $CHECKSUM;

        return $this;
    }

    public function getCreateOptions(): ?string
    {
        return $this->CREATE_OPTIONS;
    }

    public function setCreateOptions(?string $CREATE_OPTIONS)
    {
        $this->CREATE_OPTIONS = $CREATE_OPTIONS;

        return $this;
    }

    public function getTableComment(): ?string
    {
        return $this->TABLE_COMMENT;
    }

    public function setTableComment(?string $TABLE_COMMENT)
    {
        $this->TABLE_COMMENT = $TABLE_COMMENT;

        return $this;
    }

    public function getMaxIndexLength(): ?string
    {
        return $this->MAX_INDEX_LENGTH;
    }

    public function setMaxIndexLength(?string $MAX_INDEX_LENGTH)
    {
        $this->MAX_INDEX_LENGTH = $MAX_INDEX_LENGTH;

        return $this;
    }

    public function getTemporary(): ?string
    {
        return $this->TEMPORARY;
    }

    public function setTemporary(?string $TEMPORARY)
    {
        $this->TEMPORARY = $TEMPORARY;

        return $this;
    }

}