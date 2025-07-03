<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    protected $table = 'user_preferences';
    protected $primaryKey = 'UID';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'UID');
    }
}
