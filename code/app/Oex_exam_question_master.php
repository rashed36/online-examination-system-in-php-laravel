<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oex_exam_question_master extends Model
{
    protected $table="oex_exam_question_masters";
    protected $primaryKey="id";
    protected $fillable=['exam_id','question','ans','options','status'];
}
