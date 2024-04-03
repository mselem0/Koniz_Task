<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReadingInterval extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'start_page',
      'end_page'
    ];
}
