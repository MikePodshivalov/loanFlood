<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function store(Request $request)
    {
            Operation::create(
                [
                    'loan_id' => $request->loan_id,
                    'name' => $request->name,
                    'department' => $request->department,
                ]
            );
        return redirect()->back();
    }

    public function done(Request $request)
    {
        Operation::query()->where('id', $request->id)->update(
            [
                'done' => !$request->done,
                'done_time' => Carbon::now(),
            ]
        );
        return redirect()->back();
    }

    public function storeDefaultOperationsUKK(Request $request)
    {
        $loan_id = $request->loan;
        $operations = config('standardukkoperations');
        foreach ($operations as $operation) {
            Operation::create(
                [
                    'loan_id' => $loan_id,
                    'name' => $operation,
                    'department' => 'ukk',
                ]
            );
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        if(isset($request['operation_id']) && !empty($request['operation_id'])) {
            $id = $request['operation_id'];
            Operation::query()->find($id)->Delete();
        }
        return redirect()->back();
    }
}
