<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'total_class',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function classes()
    {
        return $this->hasMany(ClassModel::class); // Assuming ClassModel is the name of your class model
    }

}
