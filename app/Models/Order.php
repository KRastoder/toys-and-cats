<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'toy_id',
        'price',
        'status',
        'delivery_days',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toy()
    {
        return $this->belongsTo(Toy::class);
    }
}
