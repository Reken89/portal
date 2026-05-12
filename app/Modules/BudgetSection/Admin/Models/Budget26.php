<?php

namespace App\Modules\BudgetSection\Admin\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\ArchiveSection\Admin\Models\Ekr;
use App\Models\User;

class Budget26 extends Model
{
    use HasFactory;
    protected $table = 'budget26';
    
    protected $guarded = [];
    
    public $timestamps = false;
    
    protected $casts = [
        'data_fu' => 'array',
        'data_cb' => 'array',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function ekr()
    {
        return $this->belongsTo(Ekr::class);
    }
    
    protected function data(): Attribute
    {
        return Attribute::get(function () {
            $combined = [];
            // Берем данные напрямую из атрибутов, чтобы не зациклиться
            $fu = $this->data_fu ?? [];
            $cb = $this->data_cb ?? [];

            foreach ($fu as $userId => $values) {
                $combined[$userId] = array_merge($values, $cb[$userId] ?? []);
            }
            return $combined;
        });
    }
}