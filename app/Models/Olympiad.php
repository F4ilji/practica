<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Olympiad extends Model
{
    use HasFactory;

    protected $guarded = false;


    public function applications() {
        return $this->belongsToMany(User::class, 'applications');
    }


    public function newApplications() {
        return $this->belongsToMany(User::class, 'applications')->where('state', '=', 0)->withPivot('id','created_at');
    }

}
