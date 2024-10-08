<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'menu_id',
        'quantity',
        'delivery_date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function menu() {
        return $this->belongsTo(Menu::class);
    }
    
    public function invoice() {
        return $this->hasOne(Invoice::class);
    }
    
}
