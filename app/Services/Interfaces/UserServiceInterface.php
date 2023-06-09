<?php

namespace App\Services\Interfaces;

use App\DTO\UserViewDTO;

interface UserServiceInterface
{
    /**
     * @param int $userId
     * @return UserViewDTO
     */
    public function getById(int $userId): UserViewDTO;

    /**
     * @param int $id
     * @return bool
     */
    public function doesIdExist(int $id): bool;
}
