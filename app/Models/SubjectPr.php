<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectPr extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $fillable = ["title","description","code","credit"];
    public function tasks()
    {
        return $this->hasMany(TaskPr::class);
    }
}
