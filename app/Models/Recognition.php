<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserInfo;
use Carbon\Carbon;

class Recognition extends Model
{
    use HasFactory;
    protected $table = 'recognition';
    protected $guarded = [''];
    protected $dates = ['date'];

    public function userinfo()
    {
        return $this->hasMany(UserInfo::class,'id','iduser');
    }

    public function getDateTimeAttribute() {

        return $this->date->format('H:i:s d/m/Y');
    }
}
