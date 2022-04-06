<?php

//namespace App\Http\Controllers;
//
//use App\Services\Egrn\EgrnFabric;
//use Illuminate\Http\Request;
//
//class EgrnController extends Controller
//{
//    public function index()
//    {
//        return view('egrn.index');
//    }
//
//    public function egrnParse(Request $request)
//    {
//        $filesPath = [];
//        foreach (request()->file('files') as $file) {
//            $filesPath[] = $file->getRealPath();
//        }
//        $egrns = [];
//        foreach ($filesPath as $file) {
//            $egrn = EgrnFabric::create($file);
//            $egrns[] = $egrn;
//        }
//        dd($egrns);
//        return redirect()->back();
//    }
//}
