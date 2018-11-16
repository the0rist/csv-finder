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
     * @var array
     */
    private $data;

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
    public function printByAmount(float $amount)
    {
        $this->prepareData();

        foreach ($this->data as $key => $value) {
            if (is_array($value)) {
                $currentAmount = 0; // reset amount
                foreach ($value as $element) {
                    $currentAmount += (float)$element['amount'];
                    if ($currentAmount >= $amount) {
                        echo "{$key}, {$element['date']}" . PHP_EOL;
                        break;
                    }
                }
            }
        }
    }

    /**
     * @return void
     */
    private function prepareData()
    {
        foreach ($this->repository->getRows() as $line) {
            if ($this->isValidData($line)) {
                $this->data[$line['uid']][] = [
                    'date' => $line['date'],
                    'amount' => $line['amount']
                ];
            }
        }

        $this->sortData();
    }

    /**
     * @param array $data
     * @return bool
     */
    private function isValidData(array $data): bool
    {
        return isset($data['uid'], $data['date'], $data['amount']);
    }

    /**
     * @return void
     */
    private function sortData()
    {
        foreach ($this->data as $item) {
            usort($item, [$this, 'compareByDate']);
        }
    }

    /**
     * @param array $element
     * @param array $nextElement
     * @return int
     */
    private function compareByDate(array $element, array $nextElement): int
    {
        if ($element['date'] == $nextElement['date']) {
            return 0;
        }

        return strtotime($nextElement['date']) - strtotime($nextElement['date']);
    }
}
