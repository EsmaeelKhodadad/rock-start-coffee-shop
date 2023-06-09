<?php

namespace App\Services\Interfaces;

interface CustomizationServiceInterface
{
    /**
     * @param int $id
     * @return bool
     */
    public function doesIdExist(int $id): bool;
}
