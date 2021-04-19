<?php

namespace App\Http\Controllers\Pages;

use App\Models\Survey;
use App\Models\Prototype;
use App\Models\Properties;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rating;

class PagesController extends Controller
{
    public function index($slug){
        $survey = Survey::where('slug',$slug)->first();
        $properties_id = array_unique(Rating::where(['survey_id' => $survey->id])->pluck('properties_id')->toArray());
        $prototype_id = array_unique(Rating::where(['survey_id' => $survey->id])->pluck('prototype_id')->toArray());
        $properties = Properties::find($properties_id)->pluck('properties')->all();
        $prototype = Prototype::find($prototype_id)->pluck('prototype')->all();
        $data = array(
            'survey_name' => $survey->survey_name,
            'survey_note' => $survey->note,
            'level'     => $survey->level,
            'properties' => $properties,
            'prototype' => $prototype
        );
        return view('pages.index',['data' => $data]);
    }
}
