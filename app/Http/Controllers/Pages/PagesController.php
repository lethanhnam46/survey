<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function index($slug){
        $survey = Survey::where('slug',$slug)->first();
        $data['name'] = $survey->survey_name;
        $data['note'] = $survey->note;
        return view('pages.index',['data' => $data]);
    }
}
