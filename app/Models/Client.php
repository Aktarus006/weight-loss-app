<?php

namespace App\Models;

use App\Models\Measurement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'length_cm',
        'email',
        'profile_photo',
    ];

    public function measurements () {
        return $this->hasMany(Measurement::class);
    }

}
