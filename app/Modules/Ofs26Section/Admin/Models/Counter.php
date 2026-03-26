<?php

namespace App\Modules\Ofs26Section\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;
    protected $table = 'counters';
    
    protected $guarded = [];
    
    public $timestamps = false;
}

