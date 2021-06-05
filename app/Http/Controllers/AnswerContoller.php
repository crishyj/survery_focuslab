<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Project;
use App\Models\Question;
use App\Models\Addquestion;
use App\Models\Defanswers;
use App\Models\Addanswer;
use App\Models\Queanswer;
use App\Models\Suranswer;

class AnswerContoller extends Controller
{
    public function index($id){
        $options = Survey::where('id', '=', $id)->get();
        $questions = Question::where('survey_id', '=', $id)->where('checked', 1)->get();
        $addquesions = Addquestion::where('survey_id', '=', $id)->get();
        $defanswers = Defanswers::all();
        $projects = Project::all();
        return view('answer.index', compact('options', 'questions', 'addquesions', 'defanswers', 'projects'));
    }

    public function checkCode(Request $request){
        $result = '';
        $options = Survey::find($request['survey_id']);

        if( $options->name_check != 'on' && $options->company_check != 'on' && $options->city_check != 'on' && $options->companyarea_check != 'on'  && 
            $options->companylevel_check != 'on' && $options->companyjob_check != 'on' && $options->surveydate_check != 'on' ){
            $result = 'empty';
        }else{
            $result = 'true';
        }
        
        if($options->code == $request['code']){
            return response()->json(['success'=>$result]);
        }
        else{
            return response()->json('failed');
        }
        
    }

    public function suranswer(Request $request){

        if($request['survey_date'] == 'undefined'){
            $survey_date = null;
        }else{
            $survey_date = $request['survey_date'];
        }

        $options = new Suranswer([
            'survey_id' => $request['survey_id'],
            'user_name' => $request['name'],
            'company' => $request['company'],
            'city' => $request['city'],
            'company_area' => $request['company_area'],           
            'company_level' => $request['company_level'],
            'comany_job' => $request['comany_job'],
            'survey_date' => $request['survey_date'],            
        ]);
        $options->save();   
        $suranswer_id = $options->id;       
        // return response()->json('success');
        return response()->json(['success'=>$suranswer_id]);
    }

    public function queanswer(Request $request){
        $result = '';
        $survey_id = $request['survey_id'];
        $questions = $request['questions'];
        $answers = $request['answers'];
        $suranswer_id = $request['suranswer_id'];

        $questions = explode(",", $questions);
        $answers = explode(",", $answers);
        for ($i = 0; $i < count($questions) ; $i++) { 
            $options = new Queanswer([
                'survey_id' => $request['survey_id'], 
                'question_id' => $questions[$i],  
                'que_answer' => $answers[$i],  
                'suranswer_id' => $suranswer_id,             
            ]);
            $options->save();
        }

        $results = Addquestion::where('survey_id', '=', $survey_id)->get();

        if ($results->isEmpty()) {
            $result = 'empty';
        }else{
            $result = 'true';
        }      
       
        return response()->json(['success'=>$result]);
    }

    public function addanswer(Request $request){
        $survey_id = $request['survey_id'];
        $questions = $request['questions'];
        $answers = $request['answers'];
        $suranswer_id = $request['suranswer_id'];

        $questions = explode(",", $questions);
        $answers = explode(",", $answers);
        for ($i = 0; $i < count($questions) ; $i++) { 
            $options = new Addanswer([
                'survey_id' => $request['survey_id'], 
                'addquestion_id' => $questions[$i],  
                'addanswer' => $answers[$i], 
                'suranswer_id' => $suranswer_id,              
            ]);
            $options->save();
        }
       
        return response()->json(['success'=>$survey_id]);
        
    }

    
}
