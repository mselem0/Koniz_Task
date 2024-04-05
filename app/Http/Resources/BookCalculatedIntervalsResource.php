<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookCalculatedIntervalsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'book_id' => $this->id,
          "book_name" => $this->title,
          "num_of_read_pages" => $this->calculateIntervals()
        ];
    }
}
