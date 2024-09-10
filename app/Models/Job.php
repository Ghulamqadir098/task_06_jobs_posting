<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs_listing';
    protected $fillable = ['title', 'description', 'company_name', 'office_location', 'salary_range'];
}
