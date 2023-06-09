<?php

namespace App\Repositories\MySQL\Implementations;

use App\Models\Option;
use App\Repositories\Base\BaseRepository;
use App\Repositories\MySQL\Interfaces\OptionMySQLRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class OptionMySQLRepository extends BaseRepository implements OptionMySQLRepositoryInterface
{
    /**
     * @param Option $option
     * @param string|null $connection
     */
    public function __construct(Option $option, string $connection = null)
    {
        parent::__construct($option, $connection ?? config('database.default'));
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
