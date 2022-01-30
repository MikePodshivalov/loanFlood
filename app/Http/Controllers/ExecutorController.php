<?php

namespace App\Http\Controllers;

use App\Models\Executor;
use App\Models\Loan;
use Illuminate\Http\Request;

class ExecutorController extends Controller
{
    public function update(Request $request)
    {
        $executor = Executor::where('loan_id', $request->id);
        $fields = $executor->first();
        $executor->update([
            'km' => $request->km ?? $fields->km,
            'ukk' => $request->ukk ?? $fields->ukk,
            'pd' => $request->pd ?? $fields->pd,
            'zs' => $request->zs ?? $fields->zs,
            'iab' => $request->iab ?? $fields->iab,
        ]);
        return redirect()->back();
    }
}
