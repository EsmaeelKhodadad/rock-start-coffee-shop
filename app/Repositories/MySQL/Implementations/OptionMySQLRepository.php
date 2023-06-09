<?php

namespace App\Repositories\MySQL\Implementations;

use App\Models\Option;
use App\Repositories\Base\BaseRepository;
use App\Repositories\MySQL\Interfaces\OptionMySQLRepositoryInterface;

class OptionMySQLRepository extends BaseRepository implements OptionMySQLRepositoryInterface
{
    /**
     * @param Option $option
     */
    public function __construct(Option $option)
    {
        parent::__construct($option);
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
