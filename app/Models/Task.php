<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_name',
        'content',
        'deadline',
        'category',
        'task_status',
        'severity_level',
        'importance_indication'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}