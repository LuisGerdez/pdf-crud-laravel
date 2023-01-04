<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $appends = ['created_by_user'];

    use HasFactory;

    public function getCreatedByUserAttribute()
    {
        return User::find($this->created_by);
    }
}
