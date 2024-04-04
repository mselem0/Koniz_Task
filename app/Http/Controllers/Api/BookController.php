<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Resources\ReadingIntervalResource;
use App\Models\Book;
use App\Models\ReadingInterval;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $books = BookResource::collection(Book::get());

        return $this->successResponse($books, 'ok', 200);
    }

    public function show($book_id)
    {
        $book = Book::find($book_id);

        if (empty($book)) {
            return $this->successResponse(null, 'Not Found', 404);
        } else {
            return $this->successResponse(new BookResource($book), 'ok', 200);
        }
    }

    public function store(Request $request)
    {
        $validation = $this->validateRequest($request, [
            'title' => ['required', 'string'],
            'author' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
        ]);
        if ($validation) {
            return $validation; // Return validation error response
        }

        $book = Book::create(
            [
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->description
            ]
        );

        if ($book) {
            return $this->successResponse(new BookResource($book), 'Book has been created successfully', 201);
        } else {
            return $this->successResponse(null, 'Something went wrong !', 400);
        }
    }

    public function storeReadingInterval(Request $request)
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

        $reading_interval = ReadingInterval::create(
            [
                'user_id' => $request->user_id,
                'book_id' => $request->book_id,
                'start_page' => $request->start_page,
                'end_page' => $request->end_page
            ]
        );

        if ($reading_interval) {
            return $this->successResponse(new ReadingIntervalResource($reading_interval), 'Reading Interval has been created successfully', 201);
        } else {
            return $this->successResponse(null, 'Something went wrong !', 404);
        }


    }
}
