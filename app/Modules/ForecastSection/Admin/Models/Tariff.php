<?php

namespace App\Modules\ForecastSection\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;
    protected $table = 'forecast_tariffs';
    
    protected $guarded = [];
    
    public $timestamps = false;   
}
