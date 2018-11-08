<?php

namespace app\src\repository\csv;

use app\src\repository\DataParserInterface;

/**
 * Class CsvDataParser
 * @package app\src\repository\csv
 */
class CsvDataParser implements DataParserInterface
{
    /**
     * @inheritdoc
     */
    public function parse(array $data): array
    {
        return [
            'uid' => $data[0],
            'date' => $data[1],
            'amount' => $data[2]
        ];
    }
}
