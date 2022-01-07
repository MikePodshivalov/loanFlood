<?php

namespace App\Http\Controllers;

use App\Contracts\Synchronizable;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $loans = Loan::latest()->whereNull('deleted_at')->with('tags')
            ->get(['id', 'name', 'inn', 'type', 'amount', 'created_at', 'deleted_at']);

        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        return view('loans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLoanRequest  $request
     * @return
     */
    public function store(StoreLoanRequest $request, Synchronizable $tagsSynchronizer)
    {
        $validated = $request->validated();
        $loan = Loan::create($validated);
        if (!is_null($request['tags'])) {
            $tags = $request->getTagsFromRequest();
            $tagsSynchronizer->sync($tags, $loan);
        }
        return redirect()->route('loans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return
     */
    public function show(Loan $loan)
    {
        return view('loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return
     */
    public function edit(Loan $loan)
    {
        return view('loans.edit', compact('loan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoanRequest  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoanRequest $request, Loan $loan, Synchronizable $tagsSynchronizer)
    {
        $validated = $request->validated();
        $loan->update($validated);
        $tags = $request->getTagsFromRequest();
        $tagsSynchronizer->sync($tags, $loan);
        return redirect()->route('loans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index');
    }

    public function deleted()
    {
        $loans = Loan::latest()->onlyTrashed()->get(['id', 'name', 'inn', 'type', 'amount', 'created_at', 'deleted_at']);
        return view('loans.deleted', compact('loans'));
    }

    public function restore(Request $request)
    {
        if(isset($request['loan_id']) && !empty($request['loan_id'])) {
            $id = $request['loan_id'];
            Loan::withTrashed()->find($id)->restore();
        }
        return redirect ('deleted');
    }

    public function forceDelete(Request $request)
    {
        if(isset($request['loan_id']) && !empty($request['loan_id'])) {
            $id = $request['loan_id'];
            Loan::onlyTrashed()->find($id)->forceDelete();
        }
        return redirect ('deleted');
    }

}
