<?php

namespace app\src;

use app\src\repository\RepositoryInterface;

/**
 * Class ClientSearch
 * @package app\src
 */
class ClientSearch
{
    /**
     * @var RepositoryInterface
     */
    private $repository;

    /**
     * ClientSearch constructor
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param float $amount
     * @return void
     */
    public function printByAmount(float $amount): void
    {
        $totalMatches = 0;
        foreach ($this->repository->getRows() as $line) {
            if ($this->isValidData($line) && (float)$line['amount'] >= $amount) {
                $totalMatches++;
                echo "{$line['uid']} {$line['date']} {$line['amount']}" . PHP_EOL;
            }
        }

        echo '---' . PHP_EOL;
        echo "Total matches: {$totalMatches}" . PHP_EOL;
    }

    /**
     * @param array $data
     * @return bool
     */
    private function isValidData(array $data): bool
    {
        return isset($data['uid'], $data['date'], $data['amount']);
    }
}
