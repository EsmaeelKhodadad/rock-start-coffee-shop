<?php

namespace App\Repositories\MySQL\Implementations;

use App\Models\User;
use App\Repositories\Base\BaseRepository;
use App\Repositories\MySQL\Interfaces\UserMySQLRepositoryInterface;

class UserMySQLRepository extends BaseRepository implements UserMySQLRepositoryInterface
{
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->model->active()->where('id', $id)->first();
    }
}
