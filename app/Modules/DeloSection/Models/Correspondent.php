<?php

namespace App\Modules\DeloSection\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correspondent extends Model
{
    use HasFactory;
    protected $table = 'correspondents';
    
    protected $guarded = [];
    
    public $timestamps = false;   
}
