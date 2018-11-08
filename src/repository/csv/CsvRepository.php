<?php

namespace app\src\repository\csv;

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

        fgetcsv($handle); // Skip the first line with headers

        while (!feof($handle)) {
            $currentLine = fgetcsv($handle);

            if ($currentLine) {
                yield $this->parser->parse($currentLine);
            }

        }

        fclose($handle);
    }
}
