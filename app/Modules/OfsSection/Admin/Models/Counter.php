<?php

namespace App\Modules\OfsSection\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;
    protected $table = 'counters';
    
    protected $guarded = [];
    
    public $timestamps = false;
}