<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'book_id' => "#$this->id",
            'book_name' => $this->title,
            'book_author' => $this->author,
            'book_description' => $this->description,
            'num_of_read_pages' => '',
        ];
    }
}
