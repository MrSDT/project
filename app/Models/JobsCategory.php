<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryName',
    ];

    public function category()
    {
        return $this->hasMany(JobsData::class);
    }
}
