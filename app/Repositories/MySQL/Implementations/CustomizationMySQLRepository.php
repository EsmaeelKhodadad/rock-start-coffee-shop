<?php

namespace App\Repositories\MySQL\Implementations;

use App\Models\Customization;
use App\Repositories\Base\BaseRepository;
use App\Repositories\MySQL\Interfaces\CustomizationMySQLRepositoryInterface;

class CustomizationMySQLRepository extends BaseRepository implements CustomizationMySQLRepositoryInterface
{
    /**
     * @param Customization $customization
     */
    public function __construct(Customization $customization)
    {
        parent::__construct($customization);
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
