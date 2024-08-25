<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selected_role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'amount',
    ];

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }
}
