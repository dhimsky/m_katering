<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'type_id',
        'location_id',
        'name',
        'image',
        'price',
        'description',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }
    
    public function orders() {
        return $this->hasMany(Order::class);
    }
    
}
