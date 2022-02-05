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
        $updateArray = Executor::customUpdate($request);
        $executor->update($updateArray);
        return redirect()->back();
    }
}
