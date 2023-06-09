<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var string
     */
    public const CONNECTION_MYSQL = 'mysql';
    /**
     * @var Model
     */
    public $model;
    /**
     * @var string
     */
    public $connection;

    public function __construct(Model $model, string $connection = self::CONNECTION_MYSQL)
    {
        $this->model = $model;
        $this->connection = $connection;
    }

    /**
     * @inheritDoc
     */
    public function create(Model $model): Model
    {
        $model->setConnection($this->connection)->save();
        return $model->setConnection($this->connection)->fresh();
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): ?Model
    {
        return $this->model->setConnection($this->connection)->find($id);
    }

    /**
     * @inheritDoc
     */
    public function update(Model $model): Model
    {
        $model->setConnection($this->connection)->save();
        return $model->setConnection($this->connection)->fresh();
    }
}
