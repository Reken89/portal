<?php

namespace App\Modules\CommunalSection\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Communal extends Model
{
    use HasFactory;
    protected $table = 'communals';
    
    protected $guarded = [];
    
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
