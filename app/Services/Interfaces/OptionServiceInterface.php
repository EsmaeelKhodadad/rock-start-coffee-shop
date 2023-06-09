<?php

namespace App\Services\Interfaces;

interface OptionServiceInterface
{
    /**
     * @param int $id
     * @return bool
     */
    public function doesIdExist(int $id): bool;
}
