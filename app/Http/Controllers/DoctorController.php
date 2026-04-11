<?php
namespace App\Http\Controllers;

use App\Http\Repositories\DoctorRepository;
use Inertia\Inertia;

class DoctorController extends Controller
{
    public function __construct(private DoctorRepository $doctorRepo)
    {
    }

    public function getAllDoctorCards()
    {
        $doctors = $this->doctorRepo->getAllForCards();
        return Inertia::render('Doctors/Index', [
            'doctors' => $doctors,
        ]);
    }
}
