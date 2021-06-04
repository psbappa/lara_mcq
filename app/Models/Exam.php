<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Exam extends Model
{
    protected $table="questions";
    
    use HasFactory;

    protected $fillable = [
        'question_id', 'question', 'answer'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function get_questions(){
        return DB::table('questions')
                        // ->join('options', 'questions.id', '=', 'options.q_id')
                        ->join('answers', 'questions.id', '=', 'answers.q_id')
                        ->get()->toArray();
    }

    public function get_ans(){
        return DB::table('questions')
                        // ->join('options', 'questions.id', '=', 'options.q_id')
                        ->join('answers', 'questions.id', '=', 'answers.q_id')
                        ->get('option_number')->toArray();
    }

    public function get_options($q_id){
        return DB::table('options')
                        // ->join('questions', 'options.q_id', '=', 'questions.id')
                        // ->join('answers', 'options.q_id', '=', 'answers.q_id')
                        ->where('q_id',$q_id)
                        ->get()->toArray();
    }

    public function get_answer($q_id){
        return DB::table('answers')
                        ->where('q_id',$q_id)
                        ->get()->toArray();
    }
}
