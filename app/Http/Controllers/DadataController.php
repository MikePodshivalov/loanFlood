<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DadataController extends Controller
{
    public function index(Request $request)
    {
        $dadata = app('dadata');
        $result = $dadata->findById("party", $request['inn'], 1);
        return view('searchINN.index', compact('result'));
    }
}
