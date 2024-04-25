<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batch;
class Course extends Model
{
        protected $table = 'courses';
        protected $primaryKey = 'id';
        protected $fillable = [        
            'name',
            'syllabus',    
            'duration',
            'fee'
        ];
        use HasFactory;
        public function batches()
    {
        return $this->hasMany(Batch::class);
    }
    public function duration(){
        return $this->duration. " months";
    }
    
}
