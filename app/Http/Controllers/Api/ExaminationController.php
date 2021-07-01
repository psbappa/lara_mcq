<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Exam;

class ExaminationController extends Controller
{
    public function getAllQuestions() {
        $exams = Exam::get()->toJson(JSON_PRETTY_PRINT);
        return response($exams, 200);
    }

    public function getQuestion($id) {
        if (Exam::where('id', $id)->exists()) {
            $exam = Exam::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($exam, 200);
        } else {
            return response()->json([
            "message" => "This Question not found. Please check question number"
            ], 404);
        }
    }

    public function addQuestion(Request $request) {
        $exam = new Exam;
        $answer = new Answer;
        // return response('well', 200);

        $exam->question = $request->question;  
        $exam->is_enabled = $request->is_enabled;
        $exam->options = $request->options;

        if($exam->save()){
            $latest_exam_id = $exam->id;
            $answer->q_id = $latest_exam_id;
            $answer->option_number = $request->option_number;
            
            $data = ['last_inser_question_id'=>$latest_exam_id, 'correct_option'=>$request->option_number];
            
            if($answer->save()) {
                return response()->json([
                    'data' => $data,
                    "message" => "data inserted succesfully..."
                ], 201);
            } else {

            }

        }
    }
}
