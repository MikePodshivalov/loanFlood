<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $loans = $tag->loans()->get();
        return view('loans.index', compact('loans'));
    }
}
