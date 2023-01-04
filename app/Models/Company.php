<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Users;

class Company extends Model
{
    protected $appends = ['likes', 'likes_amount', 'created_by_user'];

    use HasFactory;

    public function getLikesAttribute()
    {
        return $this->belongstoMany('App\Models\User')->get(['user_id'])->makeHidden('pivot')->toJson();
    }

    public function getLikesAmountAttribute()
    {
        return count($this->belongstoMany('App\Models\User')->get());
    }

    public function getCreatedByUserAttribute()
    {
        return User::find($this->created_by);
    }
}
