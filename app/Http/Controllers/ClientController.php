<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

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

    public function detailChart($id){
        $suranswers =  Suranswer::where('survey_id', '=', $id)->get();      

        $sqlQuery1 = "SELECT MA.name,
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS REACTIVO,
            (SUM(CASE 	WHEN MR.culture_id=2 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=2 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=2 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=2 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS CONVENCIONAL,
            (SUM(CASE 	WHEN MR.culture_id=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS EVOLUTIVO,
            (SUM(CASE 	WHEN MR.culture_id=4 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=4 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=4 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=4 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS AGIL
            
            FROM
            modelanlayses MR,
            attributes MA,
            
            (
            SELECT F.evaluation_id, F.name,
            SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
            SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
            SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
            SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            --  /* FILTERS --------------------*/       
                    -- AND S.user_name != ''
                    -- AND S.company='EMPRESA 3'
            --  /*       AND S.city=''*/
            --  /*       AND S.comany_job=''*/
            --  /*       AND S.company_area=''*/
            --  /*       AND S.company_level=''*/
            --  /*       AND S.survey_date=''*/
                    AND F.survey_id = $id  /*  insert PROJETC ID*/
                    GROUP BY F.evaluation_id, F.name
        
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            AND MA.model_id=1
            GROUP BY MA.name";

        $result1 = DB::select(DB::raw($sqlQuery1));
        $chart1 = [];
        $chart1[] = ($result1[0]->REACTIVO) * 100;
        $chart1[] = ($result1[0]->CONVENCIONAL) * 100;
        $chart1[] = ($result1[0]->EVOLUTIVO) * 100;
        $chart1[] = ($result1[0]->AGIL) * 100;

        $sqlQuery2 = "SELECT MA.name,
            ((SUM(CASE 	WHEN MR.culture_id=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) +
            (SUM(CASE 	WHEN MR.culture_id=4 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=4 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=4 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=4 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) 
            -
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END ))) AS INDICE_EVOL,
            
            (1-((SUM(CASE 	WHEN MR.culture_id=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) +
            (SUM(CASE 	WHEN MR.culture_id=4 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=4 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=4 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=4 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) 
            -
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )))) AS COMP_INDICE_EVOL
            
            
            FROM
            modelanlayses MR,
            attributes MA,
            
            (
            SELECT F.evaluation_id, F.name,
            SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
            SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
            SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
            SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY F.evaluation_id, F.name
            
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            AND MA.model_id=1
            GROUP BY MA.name";

        $result2 = DB::select(DB::raw($sqlQuery2));
        $chart2 = [];       
        $chart2[] = ($result2[0]->INDICE_EVOL) * 100;
        $chart2[] = ($result2[0]->COMP_INDICE_EVOL) * 100;

        $sqlQuery3 = "SELECT 
            (1-((STDDEV(REACTIVO)+STDDEV(CONVENCIONAL)+STDDEV(EVOLUTIVO) +STDDEV(AGIL))/12)) as INDICE_ESTABILIDAD,
            (((STDDEV(REACTIVO)+STDDEV(CONVENCIONAL)+STDDEV(EVOLUTIVO) +STDDEV(AGIL))/12)) as COMP_INDICE_ESTABILIDAD
            
            FROM
            
            (select MA.name,
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS REACTIVO,
            (SUM(CASE 	WHEN MR.culture_id=2 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=2 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=2 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=2 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS CONVENCIONAL,
            (SUM(CASE 	WHEN MR.culture_id=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS EVOLUTIVO,
            (SUM(CASE 	WHEN MR.culture_id=4 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=4 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=4 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=4 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS AGIL
            
            FROM
            modelanlayses MR,
            attributes MA,
            
            (
            SELECT F.evaluation_id, F.name,
                SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
                SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
                SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
                SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            --   /* FILTERS --------------------*/       
            --   /*       AND S.user_name=''*/
            --   /*       AND S.company='EMPRESA 3'*/
            --   /*       AND S.city=''*/
            --   /*       AND S.comany_job=''*/
            --   /*       AND S.company_area=''*/
            --   /*       AND S.company_level=''*/
            --   /*       AND S.survey_date=''*/
                    AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY F.evaluation_id, F.name
            
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            AND MA.model_id=2
            GROUP BY MA.name) CULTURA";

        $result3 = DB::select(DB::raw($sqlQuery3));
        $chart3 = [];       
        $chart3[] = ($result3[0]->INDICE_ESTABILIDAD);
        $chart3[] = ($result3[0]->COMP_INDICE_ESTABILIDAD);

        $sqlQuery4 = "SELECT MA.name,
            (SUM(CASE 	WHEN MR.culture_id>=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id>=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id>=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id>=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS EVAS
            
            FROM
            modelanlayses MR,
            attributes MA,            
            (
            SELECT F.evaluation_id, F.name,
            SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
            SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
            SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
            SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY F.evaluation_id, F.name
            
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            GROUP BY MA.name
            ORDER BY 2 DESC
            LIMIT 0, 5";

        $result4 = DB::select(DB::raw($sqlQuery4));
        
        $chart4_label = [];
        $chart4_value = [];
        foreach ($result4 as $result) {
            $chart4_label[]  = ($result->name);
            $chart4_value[]  = ($result->EVAS);           
        }  
        
        
        $sqlQuery5 = "SELECT MA.name,
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS DEBILIDADES
            
            FROM
            modelanlayses MR,
            attributes MA,
            
            (
            SELECT F.evaluation_id, F.name,
            SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
            SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
            SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
            SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY F.evaluation_id, F.name
            
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            GROUP BY MA.name
            ORDER BY 2 DESC
            LIMIT 0, 5";

        $result5 = DB::select(DB::raw($sqlQuery5));
        
        $chart5_label = [];
        $chart5_value = [];
        foreach ($result5 as $result) {
            $chart5_label[]  = ($result->name);
            $chart5_value[]  = ($result->DEBILIDADES);
        }   


        $sqlQuery6 = "SELECT MA.name,
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS REACTIVO,
            (SUM(CASE 	WHEN MR.culture_id<=2 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id<=2 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id<=2 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id<=2 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS CONVENCIONAL,
            (SUM(CASE 	WHEN MR.culture_id<=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id<=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id<=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id<=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS EVOLUTIVO,
            (SUM(CASE 	WHEN MR.culture_id<=4 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id<=4 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id<=4 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id<=4 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS AGIL
            
            FROM
                modelanlayses MR,
                attributes MA,
            
            (
            SELECT F.evaluation_id, F.name,
            SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
            SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
            SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
            SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY F.evaluation_id, F.name
            
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            AND MA.model_id=2
            GROUP BY MA.name";

        $result6 = DB::select(DB::raw($sqlQuery6));
        
        $chart6_label = [];
        $chart6_firstValue = [];
        $chart6_secondValue = [];
        $chart6_thirdValue = [];
        $chart6_fourthValue = [];
        foreach ($result6 as $result) {
            $chart6_label[]  = ($result->name);
            $chart6_firstValue[]  = ($result->REACTIVO);
            $chart6_secondValue[]  = ($result->CONVENCIONAL);
            $chart6_thirdValue[]  = ($result->EVOLUTIVO);
            $chart6_fourthValue[]  = ($result->AGIL);
        }   

        $sqlQuery7 = "SELECT MA.name,
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS REACTIVO,
            (SUM(CASE 	WHEN MR.culture_id<=2 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id<=2 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id<=2 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id<=2 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS CONVENCIONAL,
            (SUM(CASE 	WHEN MR.culture_id<=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id<=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id<=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id<=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS EVOLUTIVO,
            (SUM(CASE 	WHEN MR.culture_id<=4 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id<=4 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id<=4 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id<=4 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS AGIL
            
            FROM
                modelanlayses MR,
                attributes MA,
                
            (
            SELECT F.evaluation_id, F.name,
            SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
            SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
            SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
            SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY F.evaluation_id, F.name
            
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            AND MA.model_id=3
            GROUP BY MA.name";

        $result7 = DB::select(DB::raw($sqlQuery7));

        $chart7_label = [];
        $chart7_firstValue = [];
        $chart7_secondValue = [];
        $chart7_thirdValue = [];
        $chart7_fourthValue = [];
        foreach ($result7 as $result) {
            $chart7_label[]  = ($result->name);
            $chart7_firstValue[]  = ($result->REACTIVO);
            $chart7_secondValue[]  = ($result->CONVENCIONAL);
            $chart7_thirdValue[]  = ($result->EVOLUTIVO);
            $chart7_fourthValue[]  = ($result->AGIL);
        }  
        
        $sqlQuery8 = "SELECT MA.name,
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS REACTIVO,
            (SUM(CASE 	WHEN MR.culture_id<=2 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id<=2 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id<=2 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id<=2 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS CONVENCIONAL,
            (SUM(CASE 	WHEN MR.culture_id<=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id<=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id<=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id<=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS EVOLUTIVO,
            (SUM(CASE 	WHEN MR.culture_id<=4 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id<=4 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id<=4 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id<=4 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS AGIL
            
            FROM
            modelanlayses MR,
            attributes MA,
            
            (
            SELECT F.evaluation_id, F.name,
            SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
            SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
            SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
            SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY F.evaluation_id, F.name
            
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            AND MA.model_id=4
            GROUP BY MA.name";

        $result8 = DB::select(DB::raw($sqlQuery8));

        $chart8_label = [];
        $chart8_firstValue = [];
        $chart8_secondValue = [];
        $chart8_thirdValue = [];
        $chart8_fourthValue = [];
        foreach ($result8 as $result) {
            $chart8_label[]  = ($result->name);
            $chart8_firstValue[]  = ($result->REACTIVO);
            $chart8_secondValue[]  = ($result->CONVENCIONAL);
            $chart8_thirdValue[]  = ($result->EVOLUTIVO);
            $chart8_fourthValue[]  = ($result->AGIL);
        } 

        $sqlQuery9 = "SELECT MA.name,
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS REACTIVO,
            (SUM(CASE 	WHEN MR.culture_id=2 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=2 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=2 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=2 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS CONVENCIONAL,
            (SUM(CASE 	WHEN MR.culture_id=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS EVOLUTIVO,
            (SUM(CASE 	WHEN MR.culture_id=4 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=4 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=4 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=4 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS AGIL
            
            FROM
            modelanlayses MR,
            attributes MA,
            
            (
            SELECT F.evaluation_id, F.name,
            SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
            SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
            SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
            SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                AND F.survey_id = $id  /*  insert PROJETC ID*/
            GROUP BY F.evaluation_id, F.name
            
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            AND MA.model_id=2
            GROUP BY MA.name";

        $result9s = DB::select(DB::raw($sqlQuery9));      
        
        
        $sqlQuery10 = "SELECT MA.name,
            ((SUM(CASE 	WHEN MR.culture_id=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) +
            (SUM(CASE 	WHEN MR.culture_id=4 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=4 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=4 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=4 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) -
            
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END ))) AS EVAS
            
            FROM
            modelanlayses MR,
            attributes MA,
            
            (
            SELECT F.evaluation_id, F.name,
            SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
            SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
            SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
            SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY F.evaluation_id, F.name
            
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            AND MA.model_id=2
            GROUP BY MA.name";

        $result10 = DB::select(DB::raw($sqlQuery10));

        $chart10_label = [];
        $chart10_firstValue = [];     
        foreach ($result10 as $result) {
            $chart10_label[]  = ($result->name);
            $chart10_firstValue[]  = ($result->EVAS) * 100;         
        } 

        $sqlQuery11 = "SELECT MA.name,
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS REACTIVO,
            (SUM(CASE 	WHEN MR.culture_id=2 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=2 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=2 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=2 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS CONVENCIONAL,
            (SUM(CASE 	WHEN MR.culture_id=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS EVOLUTIVO,
            (SUM(CASE 	WHEN MR.culture_id=4 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=4 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=4 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=4 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS AGIL
            
            FROM
            modelanlayses MR,
            attributes MA,
            
            (
            SELECT F.evaluation_id, F.name,
            SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
            SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
            SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
            SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY F.evaluation_id, F.name
            
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            AND MA.model_id=3
            GROUP BY MA.name";

        $result11s = DB::select(DB::raw($sqlQuery11));
        
        $sqlQuery12 = "SELECT MA.name,
            ((SUM(CASE 	WHEN MR.culture_id=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) +
            (SUM(CASE 	WHEN MR.culture_id=4 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=4 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=4 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=4 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) -
            
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END ))) AS EVAS
            
            FROM
            modelanlayses MR,
            attributes MA,
            
            (
            SELECT F.evaluation_id, F.name,
            SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
            SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
            SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
            SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY F.evaluation_id, F.name
            
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            AND MA.model_id=3
            GROUP BY MA.name";

        $result12 = DB::select(DB::raw($sqlQuery12));

        $chart12_label = [];
        $chart12_firstValue = [];     
        foreach ($result12 as $result) {
            $chart12_label[]  = ($result->name);
            $chart12_firstValue[]  = ($result->EVAS) * 100;         
        }

        $sqlQuery13 = "SELECT MA.name,
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS REACTIVO,
            (SUM(CASE 	WHEN MR.culture_id=2 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=2 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=2 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=2 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS CONVENCIONAL,
            (SUM(CASE 	WHEN MR.culture_id=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS EVOLUTIVO,
            (SUM(CASE 	WHEN MR.culture_id=4 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=4 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=4 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=4 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) AS AGIL
            
            FROM
            modelanlayses MR,
            attributes MA,
            
            (
            SELECT F.evaluation_id, F.name,
            SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
            SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
            SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
            SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY F.evaluation_id, F.name
            
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            AND MA.model_id=4
            GROUP BY MA.name";

        $result13s = DB::select(DB::raw($sqlQuery13));

        $sqlQuery14 = "SELECT MA.name,
            ((SUM(CASE 	WHEN MR.culture_id=3 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=3 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=3 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=3 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) +
            (SUM(CASE 	WHEN MR.culture_id=4 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=4 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=4 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=4 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END )) -
            
            (SUM(CASE 	WHEN MR.culture_id=1 AND MR.answer=1 THEN OPCION1
                        WHEN MR.culture_id=1 AND MR.answer=2 THEN OPCION2
                        WHEN MR.culture_id=1 AND MR.answer=3 THEN OPCION3
                        WHEN MR.culture_id=1 AND MR.answer=4 THEN OPCION4
                ELSE 0 END)/SUM(CASE WHEN MR.answer=1 THEN (OPCION1+OPCION2+OPCION3+OPCION4) ELSE 0 END ))) AS EVAS
            
            FROM
            modelanlayses MR,
            attributes MA,
            
            (
            SELECT F.evaluation_id, F.name,
            SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END) AS OPCION1,
            SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END) AS OPCION2,
            SUM(CASE WHEN R.que_answer=3 THEN 1 ELSE 0 END) AS OPCION3,
            SUM(CASE WHEN R.que_answer=4 THEN 1 ELSE 0 END) AS OPCION4
                FROM
                    questions F,
                    queanswers R,
                    suranswers S
                WHERE
                    F.survey_id=R.survey_id
                    AND F.id=R.question_id
                    AND F.survey_id=S.survey_id
                    AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                AND F.survey_id=5 /*  insert PROJETC ID*/
            GROUP BY F.evaluation_id, F.name
            
            ) dataset
            WHERE
            MR.evaluation_id=dataset.evaluation_id
            and MA.id=MR.attribute_id
            AND MA.model_id=4
            GROUP BY MA.name";

        $result14 = DB::select(DB::raw($sqlQuery14));

        $chart14_label = [];
        $chart14_firstValue = [];     
        foreach ($result14 as $result) {
            $chart14_label[]  = ($result->name);
            $chart14_firstValue[]  = ($result->EVAS) * 100;         
        }

        $sqlQuery15 = "SELECT F.name,
            (SUM(CASE WHEN R.que_answer=1 THEN 1 ELSE 0 END)/ 
            SUM(CASE WHEN R.que_answer<=4 THEN 1 ELSE 0 END)) AS REACTIVOS
            FROM
                questions F,
                queanswers R,
                suranswers S
            WHERE
                F.survey_id=R.survey_id
                AND F.id=R.question_id
                AND F.survey_id=S.survey_id
                AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY  F.name
            ORDER BY 2 DESC
            LIMIT 0,5";

        $result15s = DB::select(DB::raw($sqlQuery15));

        $sqlQuery16 = "SELECT F.name,
            (SUM(CASE WHEN R.que_answer=2 THEN 1 ELSE 0 END)/ 
            SUM(CASE WHEN R.que_answer<=4 THEN 1 ELSE 0 END)) AS CONVENCIONALES
            FROM
                questions F,
                queanswers R,
                suranswers S
            WHERE
                F.survey_id=R.survey_id
                AND F.id=R.question_id
                AND F.survey_id=S.survey_id
                AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                    AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY  F.name
            ORDER BY 2 DESC
            LIMIT 0,5";

        $result16s = DB::select(DB::raw($sqlQuery16));

        $sqlQuery17 = "SELECT F.name,
            (SUM(CASE WHEN R.que_answer>=2 THEN 1 ELSE 0 END)/ 
            SUM(CASE WHEN R.que_answer<=4 THEN 1 ELSE 0 END)) AS EVOLUTIVOS_AGILES
            FROM
                questions F,
                queanswers R,
                suranswers S
            WHERE
                F.survey_id=R.survey_id
                AND F.id=R.question_id
                AND F.survey_id=S.survey_id
                AND S.id=R.suranswer_id
            -- /* FILTERS --------------------*/       
            -- /*       AND S.user_name=''*/
            -- /*       AND S.company='EMPRESA 3'*/
            -- /*       AND S.city=''*/
            -- /*       AND S.comany_job=''*/
            -- /*       AND S.company_area=''*/
            -- /*       AND S.company_level=''*/
            -- /*       AND S.survey_date=''*/
                    AND F.survey_id = $id /*  insert PROJETC ID*/
            GROUP BY  F.name
            ORDER BY 2 DESC
            LIMIT 0,5";

        $result17s = DB::select(DB::raw($sqlQuery17));
        
        return view('client.detailChart', compact('result9s', 'result11s', 'result13s', 'result15s', 'result16s', 'result17s'))
                ->with('chart1',json_encode($chart1,JSON_NUMERIC_CHECK))
                ->with('chart2',json_encode($chart2,JSON_NUMERIC_CHECK))
                ->with('chart3',json_encode($chart2,JSON_NUMERIC_CHECK))
                ->with('chart4_label',json_encode($chart4_label,JSON_NUMERIC_CHECK))
                ->with('chart4_value',json_encode($chart4_value,JSON_NUMERIC_CHECK))
                ->with('chart5_label',json_encode($chart5_label,JSON_NUMERIC_CHECK))
                ->with('chart5_value',json_encode($chart5_value,JSON_NUMERIC_CHECK))
                ->with('chart6_label',json_encode($chart6_label,JSON_NUMERIC_CHECK))
                ->with('chart6_firstValue',json_encode($chart6_firstValue,JSON_NUMERIC_CHECK))
                ->with('chart6_secondValue',json_encode($chart6_secondValue,JSON_NUMERIC_CHECK))
                ->with('chart6_thirdValue',json_encode($chart6_thirdValue,JSON_NUMERIC_CHECK))
                ->with('chart6_fourthValue',json_encode($chart6_fourthValue,JSON_NUMERIC_CHECK))
                ->with('chart7_label',json_encode($chart7_label,JSON_NUMERIC_CHECK))
                ->with('chart7_firstValue',json_encode($chart7_firstValue,JSON_NUMERIC_CHECK))
                ->with('chart7_secondValue',json_encode($chart7_secondValue,JSON_NUMERIC_CHECK))
                ->with('chart7_thirdValue',json_encode($chart7_thirdValue,JSON_NUMERIC_CHECK))
                ->with('chart7_fourthValue',json_encode($chart7_fourthValue,JSON_NUMERIC_CHECK))
                ->with('chart8_label',json_encode($chart8_label,JSON_NUMERIC_CHECK))
                ->with('chart8_firstValue',json_encode($chart8_firstValue,JSON_NUMERIC_CHECK))
                ->with('chart8_secondValue',json_encode($chart8_secondValue,JSON_NUMERIC_CHECK))
                ->with('chart8_thirdValue',json_encode($chart8_thirdValue,JSON_NUMERIC_CHECK))
                ->with('chart8_fourthValue',json_encode($chart8_fourthValue,JSON_NUMERIC_CHECK))
                ->with('chart10_label',json_encode($chart10_label,JSON_NUMERIC_CHECK))
                ->with('chart10_firstValue',json_encode($chart10_firstValue,JSON_NUMERIC_CHECK))
                ->with('chart12_label',json_encode($chart12_label,JSON_NUMERIC_CHECK))
                ->with('chart12_firstValue',json_encode($chart12_firstValue,JSON_NUMERIC_CHECK))
                ->with('chart14_label',json_encode($chart14_label,JSON_NUMERIC_CHECK))
                ->with('chart14_firstValue',json_encode($chart14_firstValue,JSON_NUMERIC_CHECK));    
    }
    
}
