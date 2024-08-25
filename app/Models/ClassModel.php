<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = ['course_id', 'class_title', 'class_url', 'status'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
{
    return $this->belongsToMany(User::class)->withPivot('status');
}

}
