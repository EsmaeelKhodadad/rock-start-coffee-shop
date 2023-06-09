<?php

namespace App\Services\Implementations;

use App\DTO\UserViewDTO;
use App\Models\User;
use App\Repositories\MySQL\Interfaces\UserMySQLRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Transformers\UserTransformer;
use http\Exception\RuntimeException;

class UserService implements UserServiceInterface
{
    /**
     * @var UserMySQLRepositoryInterface
     */
    private $userMySQLRepository;

    /**
     * @param UserMySQLRepositoryInterface $userMySQLRepository
     */
    public function __construct(UserMySQLRepositoryInterface $userMySQLRepository)
    {
        $this->userMySQLRepository = $userMySQLRepository;
    }

    /**
     * @inheritDoc
     */
    public function getById(int $userId): UserViewDTO
    {
        $user = $this->userMySQLRepository->getById($userId);
        if (!$user instanceof User) {
            throw new RuntimeException('User not found!');
        }
        return UserTransformer::modelToUserViewDTO($user);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function doesIdExist(int $id):bool
    {
        $user = $this->userMySQLRepository->getbyId($id);
        return $user instanceof User;
    }
}
