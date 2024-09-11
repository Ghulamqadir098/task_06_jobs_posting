<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs_listing';
    protected $fillable = ['title', 'description', 'company_name', 'office_location', 'salary_range'];


        // A job is posted by an employer
        public function employer()
        {
            return $this->belongsTo(User::class, 'employer_id');
        }

     // A job can have many candidates applying for it
    public function candidates()
    {
        return $this->belongsToMany(User::class, 'job_user', 'job_id', 'user_id')
                    ->withTimestamps();
    }

        // Job belongs to one Category
        public function category()
        {
            return $this->belongsTo(Category::class);
        }
}
