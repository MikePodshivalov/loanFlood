<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $loans = $tag->loans()->paginate(25, ['id', 'name', 'initiator', 'type', 'amount', 'created_at', 'deleted_at']);
        return view('loans.index', compact('loans'));
    }
}
