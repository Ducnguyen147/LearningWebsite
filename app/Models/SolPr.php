<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolPr extends Model
{
    use HasFactory;
    public $fillable=["submission_date","name","email","points","evaluation_time","solution"];
    public function task()
    {
        return $this->belongsTo(TaskPr::class,'task_pr_id');
    }
}
