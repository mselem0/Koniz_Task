<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReadingIntervalResource;
use App\Models\Book;
use App\Models\ReadingInterval;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ReadingIntervalController extends Controller
{
    use ApiResponseTrait;

    public function get_intervals() {

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'integer'],
            'book_id' => ['required', 'integer'],
            'start_page' => ['required', 'integer'],
            'end_page' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return $this->successResponse(null, $validator->errors(), 400);
        }

        // Find the user by ID
        $user = User::find($request->user_id);

        // Find the book by ID
        $book = Book::find($request->book_id);

        if (empty($user)) {
            return $this->successResponse(null, 'User not Found', 404);
        }

        if (empty($book)) {
            return $this->successResponse(null, 'Book not Found', 404);
        }

        $reading_interval = new ReadingInterval(
            [
                'start_page' => $request->start_page,
                'end_page' => $request->end_page
            ]
        );

        $reading_interval->user()->associate($user);
        $reading_interval->book()->associate($book);
        $reading_interval->save();

        if ($reading_interval) {
            return $this->successResponse(new ReadingIntervalResource($reading_interval), 'Reading Interval has been created successfully', 201);
        } else {
            return $this->successResponse(null, 'Something went wrong !', 404);
        }


    }
}
