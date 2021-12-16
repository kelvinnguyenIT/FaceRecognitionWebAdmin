<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserInfo;

class Recognition extends Model
{
    use HasFactory;
    protected $table = 'recognition';
    protected $guarded = [''];

    public function userinfo()
    {
        return $this->hasMany(UserInfo::class,'id','iduser');
    }
}
