<?php

namespace App\Services\Implementations;

use App\Models\Customization;
use App\Repositories\MySQL\Interfaces\CustomizationMySQLRepositoryInterface;
use App\Services\Interfaces\CustomizationServiceInterface;

class CustomizationService implements CustomizationServiceInterface
{
    /**
     * @var CustomizationMySQLRepositoryInterface
     */
    private $customizationMySQLRepository;

    /**
     * @param CustomizationMySQLRepositoryInterface $customizationMySQLRepository
     */
    public function __construct(CustomizationMySQLRepositoryInterface $customizationMySQLRepository)
    {
        $this->customizationMySQLRepository = $customizationMySQLRepository;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function doesIdExist(int $id):bool
    {
        $customization = $this->customizationMySQLRepository->getbyId($id);
        return $customization instanceof Customization;
    }
}
