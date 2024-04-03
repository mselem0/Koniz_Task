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
}
