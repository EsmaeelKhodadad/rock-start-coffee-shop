<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'order_items' => ['required', 'array',],
            'order_items.*' => ['required', 'array',],
            'order_items.*.product_id' => ['required', 'int', 'min:1',],
            'order_items.*.customization_id' => ['nullable', 'int', 'min:1',],
            'order_items.*.option_id' => ['nullable', 'int', 'min:1',],
            'order_items.*.number' => ['required', 'int', 'min:1',],
        ];
    }
}
