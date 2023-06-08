<?php

namespace App\Resources\V1;

use App\Models\Customization;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Customization
 */
class CustomizationResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'options' => OptionResource::collection($this->options)
        ];
    }
}
