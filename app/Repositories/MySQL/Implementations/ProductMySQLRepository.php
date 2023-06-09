<?php

namespace App\Repositories\MySQL\Implementations;

use App\Models\Product;
use App\Repositories\Base\BaseRepository;
use App\Repositories\MySQL\Interfaces\ProductMySQLRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class ProductMySQLRepository extends BaseRepository implements ProductMySQLRepositoryInterface
{
    /**
     * @param Product $product
     * @param string|null $connection
     */
    public function __construct(Product $product, string $connection = null)
    {
        parent::__construct($product, $connection ?? config('database.default'));
    }

    /**
     * @inheritDoc
     */
    public function getAllWithCustomizationsAndOptions(): LengthAwarePaginator
    {
        return $this->model
            ->setConnection($this->connection)
            ->active()
            ->with(['customizations' => static function ($query) {
                $query->active();
            }, 'customizations.options' => static function ($query) {
                $query->active();
            }])->paginate(10);
    }

    /**
     * @inheritDoc
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
