<?php

namespace App\Http\Controllers\Mcq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;
use Illuminate\Support\Facades\DB;

class Examination extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Exam = new Exam();
        $questions = Exam::get()->toArray();

        $get_questions = $Exam->get_questions();

        $optionsArray = array() ;
        $answersArray = array() ;
        
        foreach($get_questions as $i => $question) {
            return view('Mcq.examination',compact('get_questions'));
        }
        return view('Mcq.examination',compact('get_questions','optionsArray','answersArray'));
    }

    /**
     * Show the result submited by user.
     *
     * @return \Illuminate\Http\Response
     */
    public function result(Request $request)
    {
        $Exam = new Exam();
        $total_questions = $Exam->get_questions();

        $request->except('_token');
        $user_ans = $request->all();
        unset($user_ans['_token']);
        $user_ans = array_values($user_ans);
        
        $get_exact_ans = $Exam->get_ans();
        $questionsArray = json_decode(json_encode($get_exact_ans), true);
        $database_ans = array_column($questionsArray, 'option_number');

        $checking = array_diff_assoc($user_ans,$database_ans);

        $total_question = count($total_questions);
        $wrong_answer = count($checking);
        $correct_answer = $total_question - $wrong_answer;

        $percentage = ( $correct_answer / $total_question ) * 100;

        return view('Mcq.result',compact('percentage','wrong_answer','total_question'));
    }

    public function add_question() {
        return view('Mcq.create');
    }

    public function submit_question(Request $request) {
        $this->validate($request,[
                                'question'=>'required',
                                'answer'=>'required',
                                'options'=>'required',
                            ]);

        $question = $request->input('question');
        $answer = $request->input('answer');
        $options = $request->input('options');
        
        $q_data=array(
                'question'      =>$question,
                'is_enabled'    =>1,
                "options"       =>$options
            );
        
        $qr_data = DB::table('e_questions')->insert($q_data);
        if($qr_data) {
            $last_insert_id = DB::getPdo()->lastInsertId();

            $a_data=array(
                'q_id'             =>$last_insert_id,
                'option_number'     =>$answer
            );
    
            $ar_data = DB::table('e_answers')->insert($a_data);
            return back()->with('success','Question inserted successfully');
        } else {
            return Redirect::back()->withErrors(['msg', 'The Message']);
        }

        
    }
}
