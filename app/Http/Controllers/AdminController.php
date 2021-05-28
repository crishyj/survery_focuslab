<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Attribute;
use App\Models\Component;
use App\Models\Culture;
use App\Models\Evaluation;
use App\Models\Modelnew;
use App\Models\Modelanlaysis;
use App\Models\Project;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Defanswers;
use App\Models\Addquestion;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.index');
    }

    public function createClient(){
        return view('admin.createClient');
    }

    public function storeClient(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nit' => ['required', 'string'],           
        ]); 
        
        if(count(User::where('email', '=', $request['email'])->get())<1){
            $options = new User([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'publicpassword' => $request['password'],
                'nit' => $request['nit'],
            ]);
            $options->save();          
            return redirect()->route('viewClient');
        }else{            
            return back();
        }         
    }

    public function viewClient(){
        $users = User::where('role', '=', '')->orWhereNull('role')->get();
        return view('admin.viewClient', compact('users'));
    }

    public function clientDelete($id){
        $options = User::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->delete();    
        return back()->with('success', 'Deleted Successfully'); 
    }

    public function createCulture(){
        return view('admin.basic.createCulture');
    }

    public function storeCulture(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:cultures'],   
            'description' => ['required', 'string'],
            'leader' => ['required', 'string'],
            'leader_desc' => ['required', 'string'],
        ]); 
        
        if(count(Culture::where('name', '=', $request['name'])->get())<1){
            $options = new Culture([
                'name' => $request['name'],
                'description' => $request['description'],
                'leader' => $request['leader'],
                'leader_desc' => $request['leader_desc']
            ]);
            $options->save();          
            return redirect()->route('viewCulture');
        }else{            
            return back();
        }  
    }

    public function viewCulture(){
        $cultures = Culture::all();
        return view('admin.basic.viewCulture', compact('cultures'));
    }

    public function updateCulture(Request $request){
        $options = Culture::find($request->get('id'));
        $options->name = $request->get('name');
        $options->description = $request->get('description');
        $options->leader = $request->get('leader');
        $options->leader_desc = $request->get('leader_desc');
        $options->save();
        return response()->json('success');
    }

    
    public function cultureDelete($id){
        $options = Culture::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->delete();    
        return back()->with('success', 'Deleted Successfully'); 
    }


    public function createModel(){
        return view('admin.basic.createModel');
    }

    public function storeModel(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:modelnews'],                      
        ]); 
        
        if(count(Modelnew::where('name', '=', $request['name'])->get())<1){
            $options = new Modelnew([
                'name' => $request['name']               
            ]);
            $options->save();          
            return redirect()->route('viewModel');
        }else{            
            return back();
        }  
    }

    public function viewModel(){
        $models = Modelnew::all();
        return view('admin.basic.viewModel', compact('models'));
    }

    public function updateModel(Request $request){
        $options = Modelnew::find($request->get('id'));
        $options->name = $request->get('name');       
        $options->save();
        return response()->json('success');
    }
    
    public function ModelDelete($id){
        $options = Modelnew::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->delete();    
        return back()->with('success', 'Deleted Successfully'); 
    }

    public function createComponent(){
        return view('admin.basic.createComponent');
    }

    public function storeComponent(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:components'],                      
        ]); 
        
        if(count(Component::where('name', '=', $request['name'])->get())<1){
            $options = new Component([
                'name' => $request['name']               
            ]);
            $options->save();          
            return redirect()->route('viewComponent');
        }else{            
            return back();
        }  
    }

    public function viewComponent(){
        $components = Component::all();
        return view('admin.basic.viewComponent', compact('components'));
    }

    public function updateComponent(Request $request){
        $options = Component::find($request->get('id'));
        $options->name = $request->get('name');       
        $options->save();
        return response()->json('success');
    }

    
    public function componentDelete($id){
        $options = Component::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->delete();    
        return back()->with('success', 'Deleted Successfully'); 
    }

    public function createAttribute(){
        $models = Modelnew::all();
        return view('admin.basic.createAttribute', compact('models'));
    }

    public function storeAttribute(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:attributes'], 
            'model_id' => ['required'], 
            'order' => ['required', 'string'],                      
        ]); 
        
        if(count(Attribute::where('name', '=', $request['name'])->get())<1){
            $options = new Attribute([
                'name' => $request['name'],
                'model_id' => $request['model_id'],
                'order' => $request['order']
            ]);
            $options->save();          
            return redirect()->route('viewAttribute');
        }else{            
            return back();
        }  
    }

    public function viewAttribute(){
        $options = Attribute::all();
        $models = Modelnew::all();
        return view('admin.basic.viewAttribute', compact('options', 'models'));
    }

    public function updateAttribute(Request $request){
        $options = Attribute::find($request->get('id'));
        $options->name = $request->get('name');
        $options->model_id = $request->get('model_id');
        $options->order = $request->get('order');
        $options->save();
        return response()->json('success');
    }

    
    public function attributeDelete($id){
        $options = Attribute::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->delete();    
        return back()->with('success', 'Deleted Successfully'); 
    }


    public function createProject(){
        return view('admin.basic.createProject');
    }

    public function storeProject(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:projects'],
            'question' => ['required', 'string'],
            'heading' => ['required', 'string'],
        ]); 
        
        if(count(Project::where('name', '=', $request['name'])->get())<1){
            switch ($request['question']) {
                case 'fquestion':
                        $label = 'PREGUNTA EN PRIMERA PERSONA';
                    break;
                case 'squestion':
                        $label = 'PREGUNTA EN TERCERA PERSONA';
                    break;
                case 'tquestion':
                        $label = 'PREGUNTA ORGANIZACION';
                    break;
                default:
                        $label = '';
                    break;
            }
            $options = new Project([
                'name' => $request['name'],
                'question' => $request['question'],
                'heading' => $request['heading'],
                'label' => $label,
            ]);
            $options->save();          
            return redirect()->route('viewProject');
        }else{            
            return back();
        }  
    }

    public function viewProject(){
        $options = Project::all();
        return view('admin.basic.viewProject', compact('options'));
    }

    public function updateProject(Request $request){
        $options = Project::find($request->get('id'));
        switch ($request->get('question')) {
            case 'fquestion':
                    $label = 'PREGUNTA EN PRIMERA PERSONA';
                break;
            case 'squestion':
                    $label = 'PREGUNTA EN TERCERA PERSONA';
                break;
            case 'tquestion':
                    $label = 'PREGUNTA ORGANIZACION';
                break;
            default:
                    $label = '';
                break;
        }
        $options->name = $request->get('name');
        $options->question = $request->get('question');
        $options->heading = $request->get('heading');
        $options->label =  $label;
        $options->save();
        return response()->json('success');
    }

    
    public function projectDelete($id){
        $options = Project::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->delete();    
        return back()->with('success', 'Deleted Successfully'); 
    }

    public function createEvalution(){
        $components = Component::all();
        return view('admin.basic.createEvalution', compact('components'));
    }

    public function storeEvalution(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:evaluations'],
            'component_id' => ['required'],
            'fquestion' => ['required', 'string'],
            'squestion' => ['required', 'string'],
            'tquestion' => ['required', 'string'],
        ]); 
        
        if(count(Evaluation::where('name', '=', $request['name'])->get())<1){
            $options = new Evaluation([
                'name' => $request['name'],
                'component_id' => $request['component_id'],
                'fquestion' => $request['fquestion'],
                'squestion' => $request['squestion'],
                'tquestion' => $request['tquestion'],
            ]);
            $options->save();          
            return redirect()->route('viewEvalution');
        }else{            
            return back();
        }  
    }

    public function viewEvalution(){
        $options = Evaluation::all();
        $components = Component::all();
        return view('admin.basic.viewEvalution', compact('options', 'components'));
    }

    public function updateEvalution(Request $request){
        $options = Evaluation::find($request->get('id'));
        $options->name = $request->get('name');
        $options->component_id = $request->get('component_id');
        $options->fquestion = $request->get('fquestion');
        $options->squestion = $request->get('squestion');
        $options->tquestion = $request->get('tquestion');
        $options->save();
        return response()->json('success');
    }

    
    public function evalutionDelete($id){
        $options = Evaluation::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->delete();    
        return back()->with('success', 'Deleted Successfully'); 
    }

    public function createModelanalysis(){
        $evaluations = Evaluation::all();
        $cultures = Culture::all();
        $attributes = Attribute::all();
        $models = Modelnew::all();
        $defanswers = Defanswers::all();
        return view('admin.basic.createModelanalysis', compact('evaluations', 'models', 'attributes', 'cultures', 'defanswers'));
    }

    public function storeModelanalysis(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:modelanlayses'],
            'evaluation_id' => ['required'],
            'model_id' => ['required'],
            'attribute_id' => ['required'],
            'culture_id' => ['required'],
            'answer' => ['required'],
        ]); 
        
        if(count(Modelanlaysis::where('name', '=', $request['name'])->get())<1){
            $options = new Modelanlaysis([
                'name' => $request['name'],
                'evaluation_id' => $request['evaluation_id'],
                'model_id' => $request['model_id'],
                'attribute_id' => $request['attribute_id'],
                'culture_id' => $request['culture_id'],
                'answer' => $request['answer']                
            ]);
            $options->save();          
            return redirect()->route('viewModelanalysis');
        }else{            
            return back();
        }  
    }
    

    public function viewModelanalysis(){
        $options = Modelanlaysis::all();
        $evaluations = Evaluation::all();
        $cultures = Culture::all();
        $attributes = Attribute::all();
        $models = Modelnew::all();
        $defanswers = Defanswers::all();
        return view('admin.basic.viewModelanalysis', compact('options', 'evaluations', 'models', 'attributes', 'cultures', 'defanswers'));
    }

    public function updateModelanalysis(Request $request){
        $options = Modelanlaysis::find($request->get('id'));
        $options->name = $request->get('name');
        $options->evaluation_id = $request->get('evaluation_id');
        $options->model_id = $request->get('model_id');
        $options->attribute_id = $request->get('attribute_id');
        $options->culture_id = $request->get('culture_id');
        $options->answer = $request->get('answer');
        $options->save();
        return response()->json('success');
    }

    
    public function modelanalysisDelete($id){
        $options = Modelanlaysis::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->delete();    
        return back()->with('success', 'Deleted Successfully'); 
    }

    

    public function parameters(){
        $cultures = Culture::all();
        $attributes = Attribute::all();
        $components = Component::all();
        $evaluations = Evaluation::all();
        $modelnews = Modelnew::all();
        $analysismodels = Modelanlaysis::all();
        $projects = Project::all();

        return view(
            'admin.basic.parameters', 
            compact('cultures', 'attributes', 'components', 'evaluations', 'modelnews', 'analysismodels', 'projects'));
    }


    public function createSurvey(){
        $clients = User::where('role', '=', '')->orWhereNull('role')->get();
        $projects = Project::all();
        $evaluations = Evaluation::all();
        return view('admin.survey.createSurvey', compact('clients', 'projects', 'evaluations'));
    }

    public function storeSurvey(Request $request){        
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:surveys'],
            'client_id' => ['required'],
            'project_id' => ['required'],
            'description' => ['required', 'string'],
            'start' => ['required'],
            'end' => ['required'],           
            'code' => ['required'],
        ]); 
        
        if(count(Survey::where('name', '=', $request['name'])->get())<1){
            $options = new Survey([
                'name' => $request['name'],
                'client_id' => $request['client_id'],
                'project_id' => $request['project_id'],
                'description' => $request['description'],
                'start' => $request['start'],
                'end' => $request['end'],
                'culturedim_check' => $request['culturedim_check'],
                'criticalfact_check' => $request['criticalfact_check'],
                'balancecard_check' => $request['balancecard_check'],
                'name_check' => $request['name_check'],
                'company' => $request['company'],
                'company_check' => $request['company_check'],
                'city' => $request['city'],
                'city_check' => $request['city_check'],
                'companyarea' => $request['companyarea'],
                'companyarea_check' => $request['companyarea_check'],
                'companylevel' => $request['companylevel'],
                'companylevel_check' => $request['companylevel_check'],
                'companyjob' => $request['companyjob'],
                'companylevel_check' => $request['companylevel_check'],
                'companyjob_check' => $request['companyjob_check'],
                'surveydate_check' => $request['surveydate_check'],
                'code' => $request['code'],
            ]);
            $options->save();   

            $survey_id = Survey::where('name', '=', $request['name'])->first()->id;

            $options = Survey::find($survey_id);
            $options->surveylink = url('/').'/'.'answer/'.$survey_id;
            $options->save();   

            $question_id = Project::find($request['project_id'])->question;
            $questions = Evaluation::pluck($question_id);

            $questions->push($survey_id);

            return response()->json(['success'=>$questions]);
        }else{            
            return response()->json('failed');
        }
       
    }

    public function storeQuestion(Request $request){
        $survey_id = $request['survey_id'];
        $questions = $request['questions'];
        $checks = $request['checks'];
        $questions = explode(",", $questions);
        $checks = explode(",", $checks);
        for ($i = 0; $i < count($questions) ; $i++) { 
            $options = new Question([
                'name' => $questions[$i],
                'checked' => $checks[$i],
                'survey_id' => $request['survey_id'],                
                'evaluation_id' => $i+1,
            ]);
            $options->save();
        }
       
        return response()->json(['success'=>$survey_id]);
    }


    public function storeAddquestion(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],           
        ]);

        $options = new Addquestion([
            'survey_id' => $request['survey_id'],
            'name' => $request['name'],
            'survey_id' => $request['survey_id'],
            'option_check' => $request['option_check'],  
            'option' => $request['option']          ,
        ]);
        $options->save();   
        return response()->json('success');
    }
    

    public function viewSurvey(){
        $options = Survey::all();    
        $clients = User::all();
        $projects = Project::all();
        return view('admin.survey.viewSurvey', compact('options', 'clients', 'projects'));
    }

    public function surveyDetail($id){
        $options = Survey::where('id', '=', $id)->get();
        $clients = User::all();
        $projects = Project::all();
        $questions = Question::where('survey_id', '=', $id)->get();
        $addquesions = Addquestion::where('survey_id', '=', $id)->get();
        $defanswers = Defanswers::all();
        return view('admin.survey.detail', compact('options', 'clients', 'projects', 'questions', 'addquesions', 'defanswers'));
    }

    
    public function surveyDelete($id){
        $options = Survey::find($id);
        $questions = Question::where('survey_id', $id);
        $addquesions = Addquestion::where('survey_id', $id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->delete();  
        $questions->delete();
        $addquesions->delete();
        return back()->with('success', 'Deleted Successfully'); 
    }

    



}
