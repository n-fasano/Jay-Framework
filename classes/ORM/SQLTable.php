<?php

namespace ORM;

class SQLTable
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
    private $tableType;
    /**
     * @String
     */
    private $engine;
    /**
     * @Float
     */
    private $version;
    /**
     * @String
     */
    private $rowFormat;
    /**
     * @Int
     */
    private $tableRows;
    /**
     * @Int
     */
    private $avgRowLength;
    /**
     * @Int
     */
    private $dataLength;
    /**
     * @Int
     */
    private $maxDataLength;
    /**
     * @Int
     */
    private $indexLength;
    /**
     * @Int
     */
    private $dataFree;
    /**
     * @Int
     */
    private $autoIncrement;
    /**
     * @\DateTime
     */
    private $createTime;
    /**
     * @\DateTime
     */
    private $updateTime;
    /**
     * @\DateTime
     */
    private $checkTime;
    /**
     * @String
     */
    private $tableCollation;
    /**
     * @String
     */
    private $checksum;
    /**
     * @String
     */
    private $createOptions;
    /**
     * @String
     */
    private $tableComment;
    /**
     * @Int
     */
    private $maxIndexLength;
    /**
     * @String
     */
    private $temporary;

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
    public function getTableType(): ?string
    {
        return $this->tableType;
    }

    public function setTableType(?string $tableType)
    {
        $this->tableType = $tableType;

        return $this;
    }
    public function getEngine(): ?string
    {
        return $this->engine;
    }

    public function setEngine(?string $engine)
    {
        $this->engine = $engine;

        return $this;
    }
    public function getVersion(): ?float
    {
        return $this->version;
    }

    public function setVersion(?float $version)
    {
        $this->version = $version;

        return $this;
    }
    public function getRowFormat(): ?string
    {
        return $this->rowFormat;
    }

    public function setRowFormat(?string $rowFormat)
    {
        $this->rowFormat = $rowFormat;

        return $this;
    }
    public function getTableRows(): ?int
    {
        return $this->tableRows;
    }

    public function setTableRows(?int $tableRows)
    {
        $this->tableRows = $tableRows;

        return $this;
    }
    public function getAvgRowLength(): ?int
    {
        return $this->avgRowLength;
    }

    public function setAvgRowLength(?int $avgRowLength)
    {
        $this->avgRowLength = $avgRowLength;

        return $this;
    }
    public function getDataLength(): ?int
    {
        return $this->dataLength;
    }

    public function setDataLength(?int $dataLength)
    {
        $this->dataLength = $dataLength;

        return $this;
    }
    public function getMaxDataLength(): ?int
    {
        return $this->maxDataLength;
    }

    public function setMaxDataLength(?int $maxDataLength)
    {
        $this->maxDataLength = $maxDataLength;

        return $this;
    }
    public function getIndexLength(): ?int
    {
        return $this->indexLength;
    }

    public function setIndexLength(?int $indexLength)
    {
        $this->indexLength = $indexLength;

        return $this;
    }
    public function getDataFree(): ?int
    {
        return $this->dataFree;
    }

    public function setDataFree(?int $dataFree)
    {
        $this->dataFree = $dataFree;

        return $this;
    }
    public function getAutoIncrement(): ?int
    {
        return $this->autoIncrement;
    }

    public function setAutoIncrement(?int $autoIncrement)
    {
        $this->autoIncrement = $autoIncrement;

        return $this;
    }
    public function getCreateTime(): ?\DateTime
    {
        return $this->createTime;
    }

    public function setCreateTime(?\DateTime $createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }
    public function getUpdateTime(): ?\DateTime
    {
        return $this->updateTime;
    }

    public function setUpdateTime(?\DateTime $updateTime)
    {
        $this->updateTime = $updateTime;

        return $this;
    }
    public function getCheckTime(): ?\DateTime
    {
        return $this->checkTime;
    }

    public function setCheckTime(?\DateTime $checkTime)
    {
        $this->checkTime = $checkTime;

        return $this;
    }
    public function getTableCollation(): ?string
    {
        return $this->tableCollation;
    }

    public function setTableCollation(?string $tableCollation)
    {
        $this->tableCollation = $tableCollation;

        return $this;
    }
    public function getChecksum(): ?string
    {
        return $this->checksum;
    }

    public function setChecksum(?string $checksum)
    {
        $this->checksum = $checksum;

        return $this;
    }
    public function getCreateOptions(): ?string
    {
        return $this->createOptions;
    }

    public function setCreateOptions(?string $createOptions)
    {
        $this->createOptions = $createOptions;

        return $this;
    }
    public function getTableComment(): ?string
    {
        return $this->tableComment;
    }

    public function setTableComment(?string $tableComment)
    {
        $this->tableComment = $tableComment;

        return $this;
    }
    public function getMaxIndexLength(): ?int
    {
        return $this->maxIndexLength;
    }

    public function setMaxIndexLength(?int $maxIndexLength)
    {
        $this->maxIndexLength = $maxIndexLength;

        return $this;
    }
    public function getTemporary(): ?string
    {
        return $this->temporary;
    }

    public function setTemporary(?string $temporary)
    {
        $this->temporary = $temporary;

        return $this;
    }
}