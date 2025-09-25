<?php

namespace App\Modules\OfsSection\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\ArchiveSection\Admin\Models\Ekr;
use App\Models\User;

class Ofs extends Model
{
    use HasFactory;
    protected $table = 'ofs';
    
    protected $guarded = [];
    
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function ekr()
    {
        return $this->belongsTo(Ekr::class);
    }
}
