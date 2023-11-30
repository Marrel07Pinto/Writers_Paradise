<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class EbooksController extends Controller
{
    public function index()
    {
        $books = Book::all(); 

        return view('Ebooks', ['books' => $books]);
    }
}
