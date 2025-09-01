<?php

namespace App\Modules\UtilitiesSection\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;
    protected $table = 'tariffs';
    
    protected $guarded = [];
    
    public $timestamps = false;
    
}