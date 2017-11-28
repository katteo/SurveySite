<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "question";


    protected $fillable = ['issue_id', 'question'];
    
    /**
     * The parent model
     */
    public function issue()
    {
        return $this->belongsTo('\App\IssueModel');
    }
    
    /**
     * Get answers for this question
     */
    public function answers()
    {
        return $this->hasMany('\App\AnswerModel', 'question_id');
    }
}
