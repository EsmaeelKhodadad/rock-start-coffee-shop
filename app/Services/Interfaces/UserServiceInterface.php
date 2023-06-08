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
}
