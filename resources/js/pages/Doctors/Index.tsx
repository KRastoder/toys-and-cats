import DoctorCard from '@/components/DoctorComponents/DoctrCard';

interface Doctor {
    id: number;
    imagePath: string;
    name: string;
    speciality: string;
    closestAvalability: string;
    cheapestPrice: number;
}

export default function Index({ doctors }: { doctors: Doctor[] }) {
    return (
        <div className="py-12">
            <div className="mx-auto max-w-7xl px-4">
                <h1 className="mb-8 text-3xl font-bold">Our Doctors</h1>

                <div className="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    {doctors.map((doctor) => (
                        <DoctorCard key={doctor.id} {...doctor} />
                    ))}
                </div>
            </div>
        </div>
    );
}
