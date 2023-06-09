<?php

namespace App\Services\Implementations;

use App\Models\Option;
use App\Repositories\MySQL\Interfaces\OptionMySQLRepositoryInterface;
use App\Services\Interfaces\OptionServiceInterface;

class OptionService implements OptionServiceInterface
{
    /**
     * @var OptionMySQLRepositoryInterface
     */
    private $optionMySQLRepository;

    /**
     * @param OptionMySQLRepositoryInterface $optionMySQLRepository
     */
    public function __construct(OptionMySQLRepositoryInterface $optionMySQLRepository)
    {
        $this->optionMySQLRepository = $optionMySQLRepository;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function doesIdExist(int $id):bool
    {
        $option = $this->optionMySQLRepository->getbyId($id);
        return $option instanceof Option;
    }
}
