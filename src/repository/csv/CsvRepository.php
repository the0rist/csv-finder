<?php

namespace app\src\repository\csv;

use app\src\repository\DataParserInterface;
use app\src\repository\RepositoryInterface;

/**
 * Class CsvRepository
 * @package app\src\repository\csv
 */
class CsvRepository implements RepositoryInterface
{
    /**
     * @var CsvDataParser
     */
    private $parser;

    /**
     * @var
     */
    private $filename;

    /**
     * CsvDataSource constructor
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->parser = new CsvDataParser();
    }

    /**
     * @inheritdoc
     */
    public function getRows()
    {
        $handle = fopen($this->filename, 'r');

        $headerLine = fgetcsv($handle);

        while (!feof($handle)) {
            $currentLine = fgetcsv($handle);
            $extractedData = $this->parser->parse($currentLine);

            yield $extractedData;
        }

        fclose($handle);
    }
}