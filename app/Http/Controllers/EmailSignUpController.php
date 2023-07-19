<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Database\Factories\BookFactory;
use Illuminate\Http\Request;

class EmailSignUpController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Book::factory();
        return 'test';
    }
}
