<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskPr extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $fillable = ["name","description","points"];
    public function subject()
    {
        return $this->belongsTo(SubjectPr::class);
    }
    public function solutions()
    {
        return $this->hasMany(SolPr::class);
    }
}
