<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recognition;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = 'user_infor';
    protected $guarded = [''];

    public function recognition()
    {
        return $this->hasMany(Recognition::class,'iduser','id');
    }
}
