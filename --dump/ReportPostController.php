<?php

namespace App\Http\Controllers;

use DB;
use App\Models\ReportPost;
use Illuminate\Http\Request;

class ReportPostController extends Controller
{
    public function reportPost(){
        return view('report.reportPost');
        }
        public function insert(Request $request){
        $first_name = $request->input('first_name');
        $data=array('first_name'=>$first_name,"last_name"=>$last_name,"city_name"=>$city_name,"email"=>$email);
        DB::table('student_details')->insert($data);
        // echo "Record inserted successfully.<br/>";
        // echo '<a href = "/insert">Click Here</a> to go back.';
        }
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('report.reportpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $report = Report

        $request->validate([
            'description' => 'max: 250',
        ]);
        
        
        $report->createReportPost([
            'description' => $request->description
        ]);
        
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportPost  $reportPost
     * @return \Illuminate\Http\Response
     */
    public function show(ReportPost $reportPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportPost  $reportPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportPost $reportPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportPost  $reportPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportPost $reportPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportPost  $reportPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportPost $reportPost)
    {
        //
    }
}
