<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReadingIntervalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'book_id' => $this->user_id,
            'start_page' => $this->start_page,
            'end_page' => $this->end_page,
            'interval' => $this->end_page - $this->start_page . " page"
        ];
    }
}
