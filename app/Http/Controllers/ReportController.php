<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class ReportController extends Controller
{
    /**
     * Manage reports.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        //
        $reports = Report::with('user','post')->orderBy('created_at', 'desc')->get();
        return view('report.manage', compact('reports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dupe = [];

        try {
            $dupe = (array)Report::where('post_id','=',$request->post_id)->where('reporter_id', '=', $request->user)->firstOrFail()->get()->all();
            $dupe = (array)Report::where('user_id','=',$request->user_id)->where('reporter_id', '=', $request->user)->firstOrFail()->get()->all();
        }
        catch(ModelNotFoundException $e) {
        }
        $report = new Report;
        $request->validate([
            'description' => 'max: 250'
        ]);

        if(empty($dupe)) {
            $report->create([
                'description' => $request->description,
                'post_id' => $request->post_id,
                'user_id' => $request->user_id,
                'reporter_id' => $request->reporter_id
            ]);
        }
        return redirect('/home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $report = Report::findOrFail($request->report_id);
        // dd($report);

        $report->update([
            'status' => $request->status,
        ]);

        return redirect('/report');
    }
}
