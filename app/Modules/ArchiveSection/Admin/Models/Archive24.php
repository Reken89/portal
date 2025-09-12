<?php

namespace App\Modules\ArchiveSection\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\ArchiveSection\Admin\Models\Ekr;
use App\Models\User;

class Archive24 extends Model
{
    use HasFactory;
    protected $table = 'archives24';
    
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
