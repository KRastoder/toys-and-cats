<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorProcedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'name',
        'description',
        'price',
        'duration_minutes',
        'is_active',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
