<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Survey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyRequest;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $survey = Survey::paginate(10);
        $viewData = [
            'surveys' => $survey
        ];
    	return view('admin.survey.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.survey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurveyRequest $request)
    {
        $data = $request->except('_token');
        // $data['user_id'] = Auth::user()->id;
        // $data['survey_name'] = $request->survey_name;
        // $data['slug'] = Str::slug($request->survey_name);
        // $data['note'] = $request->note;
         $data['start_time'] = Carbon::now();

        //$s_id =Survey::insertGetId($data);
        dd($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function active($id)
    {
        $survey=Survey::find($id);
        $survey->del_flag =! $survey->del_flag;
        $survey->save();
        return redirect()->back();
    }

    public function surveyAction(Request $request) {
        echo '<pre>';
        print_r($request->request);
        echo '</pre>';
    }

}
