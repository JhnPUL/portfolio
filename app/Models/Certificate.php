<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'issuer',
        'issued_date',
        'expiry_date',
        'description',
        'credential_url',
    ];

    protected $casts = [
        'issued_date' => 'date',
        'expiry_date' => 'date',
    ];
    public function getIssuedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }
}
