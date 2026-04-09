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
        'years_of_experience',
        'speciality',
    ];

    /**
     * Doctor belongs to a user (account)
     */
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
}
