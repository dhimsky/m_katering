<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'types';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
