<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Patient extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'patient';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'clinic_id',
        'doctor_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
