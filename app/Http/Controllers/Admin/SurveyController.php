<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survey;


class SurveyController extends Controller
{
    public function index() {
        $survey = Survey::paginate(10);
        $viewData = [
            'surveys' => $survey
        ];
    	return view('admin.survey.index', $viewData);
    }

    public function active($id)
    {
        $survey=Survey::find($id);
        $survey->del_flag =! $survey->del_flag;
        $survey->save();
        return redirect()->back();
    }

    public function logout() {
        auth()->logout();
        Session()->flush();
        return Redirect::to('/login');
    }
}
