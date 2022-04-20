<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Measurement extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'weight_kg',
        'fat_percentage',
        'blood_pressure',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
