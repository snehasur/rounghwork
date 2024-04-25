<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batch;

class Teacher extends Model
{
        protected $table = 'teachers';
        protected $primaryKey = 'id';
        protected $fillable = [        
            'name',
            'email',    
            'password',
            'phone',
            'address',
        ];
        use HasFactory;
        public function batches()
    {
        return $this->hasMany(Batch::class);
    }
}
