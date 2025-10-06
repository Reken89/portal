<?php

namespace App\Modules\OfsSection\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finish extends Model
{
    use HasFactory;
    protected $table = 'finishes';
    
    protected $guarded = [];
    
    public $timestamps = false;
}
