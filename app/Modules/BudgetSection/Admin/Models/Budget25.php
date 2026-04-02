<?php

namespace App\Modules\BudgetSection\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\ArchiveSection\Admin\Models\Ekr;
use App\Models\User;

class Budget25 extends Model
{
    use HasFactory;
    protected $table = 'budget25';
    
    protected $guarded = [];
    
    public $timestamps = false;
    
    protected $casts = [
        'data' => 'array',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function ekr()
    {
        return $this->belongsTo(Ekr::class);
    }
}
