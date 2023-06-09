<?php

namespace App\Repositories\MySQL\Implementations;

use App\Models\Customization;
use App\Repositories\Base\BaseRepository;
use App\Repositories\MySQL\Interfaces\CustomizationMySQLRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

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
