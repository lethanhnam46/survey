<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Survey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\Prototype;
use App\Models\Rating;
use App\Models\User;
use App\Models\PrototypeProperties;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $survey = User::find($id)->surveys;
        $viewData = [
            'surveys' => $survey
        ];
        return view('admin.survey.index', $viewData);
    }

    public function create()
    {
        return view('admin.survey.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token','survey_name','level','note');
        $survey = [
            'user_id' => Auth::user()->id,
            'survey_name' => $request->survey_name,
            'slug' => Str::slug($request->survey_name),
            'level' => $request->level,
            'note' => $request->note,
            'created_at' =>  Carbon::now()
        ];
        $survey_id = Survey::insertGetId($survey);

        $id_pp = [];
        foreach ($data as $key => $value) {
            if (substr($key, 0, 3) == 'pp_') {
                $properties = [
                    'properties_name' => $value,
                    'weight' => $data['ts_'.$key],
                    'created_at' =>  Carbon::now()
                ];
                array_push( $id_pp, Properties::insertGetId($properties));
            }
        }

        foreach ($data as $key => $value) {
            if (substr($key, 0, 3) == 'pt_') {
                $image = upload_image($key);
                $prototype = [
                    'survey_id' =>$survey_id,
                    'prototype_name' => $image['name'],
                    'created_at' =>  Carbon::now()
                ];
                $id_pt = Prototype::insertGetId($prototype);
                foreach ($id_pp as $key => $value) {
                    $sync = [
                        'prototype_id'=>$id_pt,
                        'properties_id'=>$value,
                        'created_at' =>  Carbon::now()
                    ];
                    PrototypeProperties::insert($sync);
                }
            }
            
        }
        return redirect()->route('survey.index');
    }

    public function active($id)
    {
        $survey = Survey::find($id);
        $survey->del_flag = !$survey->del_flag;
        $survey['updated_at'] = Carbon::now();
        $survey->save();
        return redirect()->back();
    }
}
