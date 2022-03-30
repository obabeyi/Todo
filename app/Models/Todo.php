<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'tasks',
        'status',
        'TaskStatus',
        'priority',
        'TaskDetail',
        'DeadLine',
        'user_id',
    ];
//    public function user()
//    {
//        return $this->hasMany(User::class,'id','user_id');
//    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function scopeActive($query) {
        return $query->where('status',1);
    }
    public function scopePassive($query) {
        return $query->where('status',1);
    }
}
