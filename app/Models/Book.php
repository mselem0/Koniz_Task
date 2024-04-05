<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
      'title',
      'author',
      'description'
    ];

    public function ReadingIntervals() {
        return $this->hasMany(ReadingInterval::class);
    }

    public function calculateIntervals() {
        $count = 0;

        foreach ($this->ReadingIntervals as $interval) {
            $count += $interval->end_page - $interval->start_page;
        }

        return $count;
    }
}
