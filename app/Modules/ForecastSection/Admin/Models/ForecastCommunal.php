<?php

namespace App\Modules\ForecastSection\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ForecastCommunal extends Model
{
    use HasFactory;
    protected $table = 'forecast_communals';
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }    
}