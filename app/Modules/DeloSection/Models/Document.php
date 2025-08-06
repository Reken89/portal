<?php

namespace App\Modules\DeloSection\Models;

use App\Models\User;
use App\Modules\DeloSection\Models\Npa;
use App\Modules\DeloSection\Models\Correspondent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'documents';
    
    protected $guarded = [];
    
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function npa()
    {
        return $this->belongsTo(Npa::class);
    }
    
    public function correspondent()
    {
        return $this->belongsTo(Correspondent::class);
    }
}
