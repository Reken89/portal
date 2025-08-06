<?php

namespace App\Modules\DeloSection\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Npa extends Model
{
    use HasFactory;
    protected $table = 'npa';
    
    protected $guarded = [];
    
    public $timestamps = false;   
}
