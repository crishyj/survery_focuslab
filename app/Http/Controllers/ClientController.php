<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Survey;
use App\Models\User;
use App\Models\Project;
use App\Models\Question;
use App\Models\Addquestion;
use App\Models\Defanswers;
use App\Models\Addanswer;
use App\Models\Queanswer;
use App\Models\Suranswer;
use App\Models\Evaluation;

class ClientController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(){
        return view('client.index');
    }

    public function viewSurvey(){
        $client_id = auth()->user()->id;
        $options = Survey::where('client_id', '=', $client_id)->get();    
        $projects = Project::all();
        return view('client.viewSurvey', compact('options', 'projects'));
    }

    public function detailSurvey($id){
        $options = Survey::where('id', '=', $id)->get();
        $projects = Project::all();
        $questions = Question::where('survey_id', '=', $id)->get();
        $addquesions = Addquestion::where('survey_id', '=', $id)->get();
        $defanswers = Defanswers::all();
        return view('client.detailSurvey', compact('options', 'projects', 'questions', 'addquesions', 'defanswers'));
    }

    public function surveyReport($id){        
        $projects = Project::all();
        $defanswers = Defanswers::all();
        $questions = Question::where('survey_id', '=', $id)->where('checked', 1)->get();
        $addquesions = Addquestion::where('survey_id', '=', $id)->get();
        $suranswers = Suranswer::where('survey_id', '=', $id)->get();
        $queanswers = Queanswer::where('survey_id', '=', $id)->get();
        $addanswers = Addanswer::where('survey_id', '=', $id)->get();
        $evaluations = Evaluation::all();
        return view('client.surveyReport', 
                    compact('projects', 'defanswers', 'questions', 'addquesions', 'suranswers', 'queanswers', 'addanswers', 'evaluations'));
    }
}
