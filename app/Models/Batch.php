<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Teacher;

class Batch extends Model
{
    use HasFactory;



        protected $table = 'batches';
        protected $primaryKey = 'id';
        protected $fillable = [        
            'name',
            'course_id',    
            'teacher_id',
            'start_date'
        ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
