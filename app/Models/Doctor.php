<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = [
        'user_id',
        'name',
        'profile_picture',
        'years_of_experience',
        'speciality',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function availabilities()
    {
        return $this->hasMany(DoctorAvailability::class);
    }

    public function unavailableDates()
    {
        return $this->hasMany(DoctorUnavailableDate::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function procedures()
    {
        return $this->hasMany(DoctorProcedure::class);
    }
}
