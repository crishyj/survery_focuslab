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
}
