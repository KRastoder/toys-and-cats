<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToyImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'toy_id',
        'image',
    ];

    public function toy()
    {
        return $this->belongsTo(Toy::class);
    }
}
