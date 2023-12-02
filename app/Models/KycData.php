<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycData extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'fullName',
        'email',
        'phoneNumber',
        'homeAddress',
        'dateOfBirth',
        'documentImage_path',
        'verified',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }


}
