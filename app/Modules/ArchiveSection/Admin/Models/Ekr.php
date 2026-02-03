<?php

namespace App\Modules\ArchiveSection\Admin\Models;

use App\Modules\OfsSection\Admin\Models\Ofs;
use App\Modules\OfsSection\Admin\Models\Archive26;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ekr extends Model
{
    use HasFactory;
    protected $table = 'ekr';
    
    protected $guarded = [];
    
    public $timestamps = false;
    
    public function ofs(): HasMany
    {
        return $this->hasMany(Ofs::class);
    }
    
    public function archive26(): HasMany
    {
        return $this->hasMany(Archive26::class);
    }
}
