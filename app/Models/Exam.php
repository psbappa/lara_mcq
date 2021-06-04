<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Exam extends Model
{
    protected $table="e_questions";
    
    use HasFactory;

    protected $fillable = [
        'question_id', 'question', 'answer'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function get_questions(){
        return DB::table('e_questions')
                        ->join('e_answers', 'e_questions.id', '=', 'e_answers.q_id')
                        ->get()->toArray();
    }

    public function get_ans(){
        return DB::table('e_questions')
                        ->join('e_answers', 'e_questions.id', '=', 'e_answers.q_id')
                        ->get('option_number')->toArray();
    }

    public function get_answer($q_id){
        return DB::table('e_answers')
                        ->where('q_id',$q_id)
                        ->get()->toArray();
    }
}
