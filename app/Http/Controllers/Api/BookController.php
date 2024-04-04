<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
 use App\Models\Book;
 use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $books = Book::paginate(10); // Assuming 10 items per page, you can adjust this number as needed
        $booksCollection = BookResource::collection($books);

        return $this->successResponse($booksCollection, 'ok', 200);
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
}
