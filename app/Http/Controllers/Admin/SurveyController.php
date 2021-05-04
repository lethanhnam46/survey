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
use App\Models\Result;
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

    public function results($id)
    {
        $prototypes = survey::find($id)->prototypes;
        $properties = $prototypes[0]->properties;
        $ratings = Rating::where('survey_id',$id)->get();
        $total_score = [];
        $sum =0;
        $total = [];

        foreach ($ratings as $rating)
        {
            $rating_id = $rating->id;
            $results = $rating->results;
            $prototype_ids = $results->unique('prototype_id')->pluck('prototype_id');
            foreach ($prototype_ids as $prototype_id)
            {
                $total_score[$rating_id.'_'.$prototype_id] = $results->where('prototype_id',$prototype_id)->sum('weighted_score');
            }
        }
        
        $prototypes_id = $prototypes->pluck('id');

        foreach ($prototypes_id as $value)
        {
            foreach ($total_score as $name_total_score => $value_total_score)
            {   
                $key = explode('_',$name_total_score)[1];
                if ( $key == (string)$value) $sum += $value_total_score;
            }
            $total[$value] = round($sum/ count($prototypes_id),2);
        }
        
        arsort($total);
        $data = [
            ''
        ];

    }

    public function result($id)
    {
        $ratings = Rating::where('survey_id', $id)->get();
        dd($ratings);
    }
}
