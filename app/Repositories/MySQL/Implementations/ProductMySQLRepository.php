<?php

namespace App\Repositories\MySQL\Implementations;

use App\Models\Product;
use App\Repositories\Base\BaseRepository;
use App\Repositories\MySQL\Interfaces\ProductMySQLRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductMySQLRepository extends BaseRepository implements ProductMySQLRepositoryInterface
{
    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    /**
     * @return void
     */
    public function getAllWithCustomizationsAndOptions(): LengthAwarePaginator
    {
        return $this->model->active()->with(['customizations' => static function ($query) {
            $query->active();
        }, 'customizations.options' => static function ($query) {
            $query->active();
        }])->paginate(10);
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
