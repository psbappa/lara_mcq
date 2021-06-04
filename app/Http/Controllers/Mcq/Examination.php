<?php

namespace App\Http\Controllers\Mcq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;

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

        return view('Mcq.result',compact('percentage','wrong_answer'));


    }
}
