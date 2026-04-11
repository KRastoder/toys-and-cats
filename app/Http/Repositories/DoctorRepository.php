<?php
namespace App\Http\Repositories;

use App\Models\Doctor;
use Carbon\Carbon;

class DoctorRepository
{
    public function __construct(private Doctor $doctor_model)
    {
    }

    public function getAllForCards()
    {
        return $this->doctor_model
            ->with(['availabilities', 'procedures', 'unavailableDates', 'user'])
            ->get()
            ->map(function ($doctor) {
                return [
                    'id'                 => $doctor->id,
                    'imagePath'          => $doctor->profile_picture ?? '/default-avatar.png',
                    'name'               => $doctor->name,
                    'speciality'         => $doctor->speciality,
                    'closestAvalability' => $this->getClosestAvailability($doctor),
                    'cheapestPrice'      => $this->getCheapestPrice($doctor),
                ];
            });
    }

    private function getClosestAvailability($doctor)
    {
        $availabilities   = $doctor->availabilities;
        $unavailableDates = $doctor->unavailableDates->pluck('date')->toArray();

        $now = Carbon::now();

        // Check next 30 days
        for ($i = 0; $i < 30; $i++) {
            $checkDate = $now->copy()->addDays($i);
            $dayName   = strtolower($checkDate->format('l')); // monday, tuesday, etc

            // Check if doctor is available this day and not on unavailable list
            if ($availabilities->where('day_of_week', $dayName)->count() > 0
                && ! in_array($checkDate->format('Y-m-d'), $unavailableDates)) {
                return $checkDate->format('M d, Y');
            }
        }

        return 'No availability';
    }

    private function getCheapestPrice($doctor)
    {
        return $doctor->procedures
            ->where('is_active', true)
            ->min('price') ?? 0;
    }
}
