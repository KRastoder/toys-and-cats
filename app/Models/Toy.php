<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'main_image',
        'price',
        'discount',
    ];

    public function images()
    {
        return $this->hasMany(ToyImage::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
