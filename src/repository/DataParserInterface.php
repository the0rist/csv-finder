<?php

namespace app\src\repository;

/**
 * Interface DataParserInterface
 * @package app\src\repository
 */
interface DataParserInterface
{
    /**
     * @param array $data
     * @return array
     */
    public function parse(array $data): array;
}
