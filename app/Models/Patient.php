<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'pet_id',
        'pet_name',
        'owner_name',
        'gender',
        'phone_number',
        'city',
        'status_id',
        'breed_id',
        'date_of_birth',
        'address',
        'township',
    ];
    public function breed(){
        return $this->belongsTo(Breed::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
}
