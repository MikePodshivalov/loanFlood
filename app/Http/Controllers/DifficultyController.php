<?php

namespace App\Http\Controllers;

use App\Models\Difficulty;
use Illuminate\Http\Request;

class DifficultyController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'difficulty' => 'required|integer|min:1|max:5'
        ]);
        Difficulty::where('loan_id', $request->id)->update(
            ['difficulty' => $request->difficulty]
        );
        return redirect()->back();
    }
}
