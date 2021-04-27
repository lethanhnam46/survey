<?php

namespace App\Http\Controllers\Pages;

use Carbon\Carbon;
use App\Models\Survey;
use App\Models\Prototype;
use App\Models\Properties;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Result;

class PagesController extends Controller
{
    public function index($slug){
        $survey = Survey::where('slug',$slug)->first();

        $prototype_name = Prototype::where('survey_id',$survey->id)->pluck('prototype_name','id')->all();
        $properties_name = $survey->prototypes[0]->properties->pluck('properties_name','id')->all();

        $data = array(
            'id' => $survey->id,
            'survey_name' => $survey->survey_name,
            'survey_note' => $survey->note,
            'level'     => $survey->level,
            'prototype_name' => $prototype_name,
            'properties_name' => $properties_name
        );

        return view('pages.index',['data' => $data]);
    }

    public function store(Request $request, $survey_id)
    { 
        dd($request);
        $data = $request->except('_token');
        $rating = [
            'survey_id' => $survey_id,
            'created_at' => Carbon::now()
        ];

        $id_rating = Rating::insertGetId($rating);

        foreach($data as $key => $value) {
            $pp = explode("_", $key);
            $result = [
                'rating_id' => $id_rating,
                'prototype_id' => $pp[1],
                'properties_id' => $pp[2],
                'rating' => $value,
                'weighted_score' => $this->weighted_score($pp[2],$value),
                'created_at' => Carbon::now()
            ];
            $id = Result::insertGetId($result);
            $data['survey_name'] = survey::find($survey_id)->survey_name;
        }
        return view('pages.notisub', ['data' => $data]);
    }

    public function weighted_score($properties_id, $rating) {
        $weight = properties::find($properties_id)->weight;
        $weighted_score = $rating*$weight/100;
        return  $weighted_score;
    }
}
