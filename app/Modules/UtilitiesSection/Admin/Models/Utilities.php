<?php

namespace App\Modules\UtilitiesSection\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Utilities extends Model
{
    use HasFactory;
    protected $table = 'utilities';
    
    protected $guarded = [];
    
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
