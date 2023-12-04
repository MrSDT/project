<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'advertise_category';
    protected $primaryKey = 'id';
    protected $fillable = [
      'categoryName',
    ];

    public function category()
    {
        return $this->hasMany(AdvertiseData::class);
    }
}
