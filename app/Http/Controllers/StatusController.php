<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'special_status' => 'required|string|max:20'
        ]);
        Status::where('loan_id', $request->input('id'))->update(
            ['special_status' => $request->input('special_status')],
        );
        return redirect()->back();
    }
}
