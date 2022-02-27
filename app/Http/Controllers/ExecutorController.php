<?php

namespace App\Http\Controllers;

use App\Events\LoanSendToDepartments;
use App\Listeners\SendLoanCreatedNotificationToExecutors;
use App\Models\Executor;
use App\Models\Loan;
use App\Models\Status;
use App\Models\User;
use DragonCode\Support\Facades\Helpers\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;

class ExecutorController extends Controller
{
    public function update(Request $request)
    {
        $executor = Executor::where('loan_id', $request->id);
        $loan = Loan::where('id', $request->id)->first();
        $updateArray = Executor::customUpdate($request);
        $res = $executor->update($updateArray);
        if ($res) {
            $emails[] = User::where('name', Arr::values($updateArray)[0])->value('email');
            Event::dispatch(new LoanSendToDepartments($loan, $emails));
        }
        return redirect()->back();
    }

    public function sendLoanToDepartments(Request $request)
    {
        $loan = Loan::where('id', $request->input('loan_id'))->first();
        $emails = Loan::getEmailsOfDepartments($loan);
        Event::dispatch(new LoanSendToDepartments($loan, $emails));
        Executor::setPublished($request->loan_id);
        Executor::setTimeOfStart($request->loan_id);
        $statusUpdate = Status::where('loan_id', $request->input('loan_id'))->update(
            ['simple_status' => Str::limit(config('simplestatus')[1], 20)],
        );
        return redirect()->back();
    }
}
