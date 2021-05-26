<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Project;
use App\Models\Question;
use App\Models\Addquestion;
use App\Models\Defanswers;

class AnswerContoller extends Controller
{
    public function index($id){
        $options = Survey::where('id', '=', $id)->get();
        $questions = Question::where('survey_id', '=', $id)->get();
        $addquesions = Addquestion::where('survey_id', '=', $id)->get();
        $defanswers = Defanswers::all();
        return view('answer.index', compact('options', 'questions', 'addquesions', 'defanswers'));
    }

    public function checkCode(Request $request, $id){
        dd($id);
        dd($request['code']);
    }
}
