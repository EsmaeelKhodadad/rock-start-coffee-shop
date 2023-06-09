<?php

namespace App\Repositories\MySQL\Implementations;

use App\Models\User;
use App\Repositories\Base\BaseRepository;
use App\Repositories\MySQL\Interfaces\UserMySQLRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

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
     * @return Model|null
     */
    public function getById(int $id): ?Model
    {
        return $this->model
            ->setConnection($this->connection)
            ->active()
            ->where('id', $id)
            ->first();
    }
}
