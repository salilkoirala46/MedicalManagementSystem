<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Doctor;
use App\Models\Patient;

class clinic extends Model
{
    use HasFactory;

    protected $table = 'clinic';

    protected $fillable = [
        'clinic_name',
    ];

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class,'clinic_id');
    }
    
    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class,'clinic_id');
    }
}
