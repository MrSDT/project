<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertiseData extends Model
{
    use HasFactory;

    protected $table = 'advertise';
    protected $primaryKey = 'id';
    protected $fillable = [
      'userid',
      'categoryName',
      'title',
      'description',
      'advertiseImage_path',
      'phoneNumber',
      'email',
      'startingPrice',
      'verified',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function catid()
    {
        return $this->belongsTo(Category::class);
    }
}
