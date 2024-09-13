<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'current_position',
        'date_of_birth',
        'job_title',
        'date_of_birth',
        'cv',
        'cover_letter',
        'company_name',
        'company_logo',
        'company_location',
        'head_count',
    ];



    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // An employer has many jobs
    public function postedJobs()
    {
        return $this->hasMany(Job::class, 'employer_id');
    }

    // A candidate can apply to many jobs
    public function appliedJobs()
    {
        return $this->belongsToMany(Job::class, 'job_user', 'user_id', 'job_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
        ];
    }
}
