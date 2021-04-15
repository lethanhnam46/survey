<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Survey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyRequest;
use App\Models\Properties;
use App\Models\Prototype;
use App\Models\Rating;
use App\Models\User;
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
        $id = Auth::user()->id;
        $survey = User::find($id)->surveys;
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
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $surveys['user_id'] = Auth::user()->id;
        $surveys['survey_name'] = $request->survey_name;
        $surveys['slug'] = Str::slug($request->survey_name);
        $surveys['note'] = $request->note;
        $surveys['start_time'] = Carbon::now();
        $properties=[];
        $prototypes=[];
        foreach ($data as $key => $value) {
                if ( substr($key,0,3) == 'pp_') array_push($properties,$value);
                if ( substr($key,0,3) == 'pt_') array_push($prototypes,$value);
        }

        $savedata = array(
            'surveys' => $surveys,
            'properties' => $properties,
            'prototypes' => $prototypes
        );

        $survey_id= Survey::create($surveys);
        foreach ($prototypes as $prototypes_key => $prototypes_value) {
            $prototypes_id=Prototype::create(['prototype' => $prototypes_value]);
            foreach($properties as $properties_key => $properties_value) {
                $properties_id=Properties::create(['properties' => $properties_value]);
                $rating = array(
                    'survey_id' => $surey_id,
                    'prototype_id' => $prototypes_id,
                    'properties_id' => $properties_id,
                    'level' => $request->level
                );
                $rating_id = Rating::create($rating);
            }
        }
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
        echo '</prev>';
    }

}
