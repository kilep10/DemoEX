<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index (){
        $reports = Report:: where ('user_id', Auth::user()->id)->get();
        return view('report.index',compact('reports'));
    }

    public function create(){
        return view('report.create');
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'number' => ['required','string','max:255'],
            'descr' => ['required','string'],
        ]);
        Report::create([
            'number'=> $request->number,
            'descr'=> $request->descr,
            'status_id'=> 1,
            'user_id'=> Auth::user()->id,
        ]);

        return redirect()->route('dashboard');
    }

    public function update(Request $request){
        $request->validate([
            'status_id'=> ['required'],
            'id'=>  ['required'],
        ]);
        Report::where('id', $request->id)->update([
            'status_id'=> $request->status_id,
        ]);
        return redirect()->back();
    }
}
