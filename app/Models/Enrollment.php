<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batch;
use App\Models\Student;

class Enrollment extends Model
{
    use HasFactory;
        protected $table = 'enrollments';
        protected $primaryKey = 'id';
        protected $fillable = [        
            'enroll_no',
            'batch_id',    
            'student_id'
            
        ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
    public static function boot()
    {
        parent::boot();

        // Listen for the creating event and generate the Eno value
        static::creating(function ($item) {
            $latestEno = static::max('enroll_no');
            $nextEnoNumber = (int)substr($latestEno, 3) + 1; // Extract the numeric part and increment
            $item->enroll_no = 'EN-' . $nextEnoNumber;
        });
    }
}
