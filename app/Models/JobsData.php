<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsData extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'categoryName',
        'title',
        'description',
        'jobImage_path',
        'phoneNumber',
        'email',
        'workingHours',
        'verified',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function catid()
    {
        return $this->belongsTo(JobsCategory::class);
    }

    public function kyc()
    {
        return $this->belongsTo(KycData::class, 'userid');
    }
}
